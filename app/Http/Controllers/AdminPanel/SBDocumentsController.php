<?php
namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\documents;
use App\Models\resident_info;
use App\Models\person_involve;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Event;

class SBDocumentsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = documents::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "<a href=\"javascript:void(0)\" data-toggle=\"tooltip\"  data-id=\"{$row->id}\" data-original-title=\"Edit\" class=\"edit btn btn-info  btn-xs pr-4 pl-4 editBlotter\"><i class=\"fa fa-pencil fa-lg\"></i> </a>";
                    $btn = "$btn <a href=\"javascript:void(0)\" data-toggle=\"tooltip\"   data-id=\"{$row->id}\" data-original-title=\"Delete\" class=\"btn btn-danger btn-xs pr-4 pl-4 deleteBlotter\"><i class=\"fa fa-trash fa-lg\"></i> </a>";
                    $btn = "$btn <a href=\"javascript:void(0)\" data-toggle=\"tooltip\"  data-id=\"{$row->id}\" data-original-title=\"View\" class=\"btn btn-primary btn-xs pr-4 pl-4 viewBlotter\"><i class=\"fa fa-folder fa-lg\"></i> </a>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }   

        return view('pages.AdminPanel.documents');
    }

    public function client_index(Request $request)
    {
        $data = documents::all();
        return Datatables::of($data);
    }

    public function admin_index()
    {
        $data = documents::all();
        return response()->json($data);
    }

    private function encryptFile($file)
    {
        // Generate a random encryption key
        $encryptionKey = Str::random(32);
        
        // Read the PDF content
        $fileContent = file_get_contents($file->getRealPath());
        
        // Generate IV
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        
        // Encrypt the content
        $encryptedContent = openssl_encrypt(
            $fileContent,
            'aes-256-cbc',
            $encryptionKey,
            OPENSSL_RAW_DATA,
            $iv
        );
        
        // Combine IV with encrypted content
        $encryptedData = base64_encode($iv . $encryptedContent);
        
        return [
            'encrypted_content' => $encryptedData,
            'encryption_key' => $encryptionKey
        ];
    }

    private function decryptFile($encryptedData, $encryptionKey)
    {
        // Decode the base64 data
        $encryptedData = base64_decode($encryptedData);
        
        // Extract IV and encrypted content
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($encryptedData, 0, $ivLength);
        $encryptedContent = substr($encryptedData, $ivLength);
        
        // Decrypt the content
        $decryptedContent = openssl_decrypt(
            $encryptedContent,
            'aes-256-cbc',
            $encryptionKey,
            OPENSSL_RAW_DATA,
            $iv
        );
        
        return $decryptedContent;
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "doc_title" => "required",
                "doc_author" => "required",
                "doc_co_author" => "required",
                "doc_description" => "required",
                "date_published" => "required",
                "doc_file" => "required|file|mimes:pdf,PDF",
                "doc_type"  => "required",
                "doc_subject_matter"=> "required",
                "year_in_series"=> "required"
            ]
        );

        if ($validator->fails()) {
            return response()->json(['status' => 1, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $file = $request->file('doc_file');
            $fileName = $file->getClientOriginalName();
            
            // Encrypt the file
            $encryptedData = $this->encryptFile($file);
            
            // Store the encrypted file
            Storage::put("/files/{$fileName}.enc", $encryptedData['encrypted_content']);
            //$path = $file->storeAs('/files', $fileName. '.enc', $encryptedData['encrypted_content']);
            
            // Create document record with encryption key
            $document = documents::create([
                'title' => $request->doc_title,
                'sponsored' => $request->doc_author,
                'co_sponsored' => $request->doc_co_author,
                'description' => $request->doc_description,
                'date_published' => $request->date_published,
                'file_name' => $fileName . '.enc', // Store encrypted filename
                'type' => $request->doc_type,
                'subject_matter' => $request->doc_subject_matter,
                'year_in_series'=> $request->year_in_series,
                'encryption_key' => $encryptedData['encryption_key'] // Add this column to your documents table
            ]);

            return response()->json(['success' => 'File saved successfully.']);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to store file: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, documents $documents, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "doc_title" => "required",
                "doc_author" => "required",
                "doc_co_author" => "required",
                "doc_description" => "required",
                "date_published" => "required",
                "doc_file" => "nullable|file|mimes:pdf,PDF",
                "doc_type"  => "required",
                "doc_subject_matter"=> "required",
                "year_in_series"=> "required"
            ]
        );

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            if ($request->hasFile('doc_file')) {
                $file_existing = documents::findOrFail($id);
                
                // Delete the old encrypted file
                if (Storage::delete("/files//" . $file_existing->file_name)) {
                    // Encrypt and store the new file
                    $file = $request->file('doc_file');
                    $fileName = $file->getClientOriginalName();
                    
                    // Encrypt the file
                    $encryptedData = $this->encryptFile($file);
                    
                    // Store the encrypted file
                    Storage::put('/files//' . $fileName . '.enc', $encryptedData['encrypted_content']);
                    //$path = $file->storeAs('/files', $fileName. '.enc', $encryptedData['encrypted_content']);
                    // Update document with new encryption key
                    $documents = documents::where('id', $id)->update([
                        'title' => $request->doc_title,
                        'sponsored' => $request->doc_author,
                        'co_sponsored' => $request->doc_co_author,
                        'description' => $request->doc_description,
                        'date_published' => $request->date_published,
                        'file_name' => $fileName . '.enc',
                        'type' => $request->doc_type,
                        'subject_matter' => $request->doc_subject_matter,
                        'year_in_series' => $request->year_in_series,
                        'encryption_key' => $encryptedData['encryption_key']
                    ]);
                    
                    return response()->json(['success' => 'Document updated successfully.', 'status' => $documents]);
                }
                
                return response()->json(['status' => 0, 'error' => 'Failed to delete old file']);
            }
            
            return response()->json(['status' => 0, 'error' => 'No file provided']);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update file: ' . $e->getMessage()], 500);
        }
    }

    public function downloadPDF($id)
    {
        try {
            $file = documents::findOrFail($id);
            $filePath = storage_path('app\\public\files\\' . $file->file_name);
            $ui='d';

            if (file_exists($filePath)) {
                // Read encrypted content
                $encryptedContent = Storage::get('files/' . $file->file_name);
                $ui=$encryptedContent;
                // Decrypt the content
                $decryptedContent = $this->decryptFile($encryptedContent, $file->encryption_key);
                
                if ($decryptedContent === false) {
                    throw new \Exception('Failed to decrypt file');
                }
                
                // Return decrypted PDF
                return response($decryptedContent)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="' . str_replace('.enc', '', $file->file_name) . '"')
                    ->header('Cache-Control', 'no-store, must-revalidate')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', '0');
            }
            
            return response()->json(['failed' => 'File not found','Data'=> $ui]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to download file: ' . $e->getMessage()], 500);
        }
    }

    public function bulkStore(Request $request)
{
    $validatedData = $request->validate([
        'documents.*.title' => 'required|string',
        'documents.*.type' => 'required|in:ordinance,resolution',
        'documents.*.author' => 'required|string',
        'documents.*.co_author' => 'nullable|string',
        'documents.*.description' => 'required|string',
        'documents.*.date_published' => 'required|date',
        'documents.*.file' => 'required|file|mimes:pdf,PDF',
        'documents.*.subject_matter' => 'required|string',
        'documents.*.year_in_series' => 'required|int',
    ]);

    try {
        foreach ($request->documents as $document) {
            $file = $document['file'];
            $fileName = $file->getClientOriginalName();
            
            // Encrypt the file
            $encryptedData = $this->encryptFile($file);
            
            // Store the encrypted file
            Storage::put('/files//' . $fileName . '.enc', $encryptedData['encrypted_content']);
            //$path = $file->storeAs('/files', $fileName. '.enc', $encryptedData['encrypted_content']);
            
            documents::create([
                'title' => $document['title'],
                'type' => $document['type'],
                'sponsored' => $document['author'],
                'co_sponsored' => $document['co_author'] ?? 'N/A',
                'description' => $document['description'] ?? 'N/A',
                'date_published' => $document['date_published'],
                'file_name' => $fileName . '.enc', // Store encrypted filename
                'subject_matter' => $document['subject_matter'],
                'year_in_series' => $document['year_in_series'],
                'encryption_key' => $encryptedData['encryption_key'] // Store encryption key
            ]);
        }

        return response()->json(['message' => 'Documents uploaded and encrypted successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to process documents: ' . $e->getMessage()], 500);
    }
}

    public function show(documents $blotter)
    {
        
        if (!session()->has("user")) {
            return redirect("login");
        }
        
        //$resident = resident_info::all();
        $blotter = documents::all();
        return view('pages.AdminPanel.documents', ['blotter' => $blotter]); 
        //return view('pages.AdminPanel.documents',['response'=>$blotter]); 
        //return view('pages.AdminPanel.documents');
    }


    public function edit($id)
    {
        
        $docDetails = documents::find($id);
        //$person_involve = person_involve::where('blotter_id', $blotter->blotter_id)->get();

        return response()->json($docDetails);
    }

    public function getStats()
    {
        try {
            $currentYear = date('Y');
            
            $ordinances = Documents::where('type', 'ordinance')
                ->whereYear('date_published', $currentYear)
                ->count();
            
            $resolutions = Documents::where('type', 'resolution')
                ->whereYear('date_published', $currentYear)
                ->count();
            
            $meetings = Event::whereYear('created_at', $currentYear)
                ->where(function($query) {
                    $query->whereRaw('LOWER(title) LIKE ?', ['%meeting%'])
                          ->orWhereRaw('LOWER(title) LIKE ?', ['%session%']);
                })
                ->count();
            
            $hearings = Event::whereYear('created_at', $currentYear)
                ->whereRaw('LOWER(title) LIKE ?', ['%hearing%'])
                ->count();
    
            return response()->json([
                'ordinances' => $ordinances,
                'resolutions' => $resolutions,
                'meetings' => $meetings,
                'hearings' => $hearings
            ]);
    
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error in getStats: ' . $e->getMessage());
            return response()->json([
                'error' => 'An error occurred while fetching statistics',
                'ordinances' => 0,
                'resolutions' => 0,
                'meetings' => 0,
                'hearings' => 0
            ], 500);
        }
    }

public function getRecent()
{
    $recentDocs = Documents::select('id', 'title', 'type', 'date_published')
        ->orderBy('date_published', 'desc')
        ->limit(5)
        ->get();
    
    return response()->json($recentDocs);
}




    public function destroy($id)
    {
        documents::find($id)->delete();

        return response()->json(['success' => 'Blotter deleted successfully.']);
    }
}
