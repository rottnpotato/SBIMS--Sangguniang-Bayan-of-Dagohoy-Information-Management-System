<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\documents;
use App\Models\resident_info;
use App\Models\person_involve;
//Plugins
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Validator;

class kk extends Controller
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

        //return view('pages.AdminPanel.documents',  compact('documents'));
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
       // return response("ERROR");
        
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
        } else {

         
           // $path2 = $request->file('doc_file')->store('/...public/files');
            $file = $request->file('doc_file');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('/files', $fileName);
            $blotters = documents::updateOrCreate(
                [
                    'title' => $request->doc_title,
                    'sponsored' => $request->doc_author,
                    'co_sponsored' => $request->doc_co_author,
                    'description' => $request->doc_description,
                    'date_published' => $request->date_published,
                    'file_name' => $fileName,
                    'type' => $request->doc_type,
                    'subject_matter' => $request->doc_subject_matter,
                    'year_in_series'=> $request->year_in_series
                    
                ]
            );

            $blotter_id = $blotters->blotter_id;
            //DB::table('person_involves')->where('blotter_id',  $blotter_id)->delete();
            //DB::table('resolutions_ordinances');
   


            return response()->json(['success' => 'File saved successfully.']);
        }
    }


    public function update(Request $request, documents $documents,$id)
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
    } else {
    $documents->title = $request->doc_title;
    $documents->type = $request->doc_type;
    $documents->author = $request->doc_author;
    $documents->co_author = $request->doc_co_author;
    $documents->description = $request->doc_description;
    $documents->date_published = $request->date_published;
    $documents->subject_matter = $request->doc_subject_matter;
    $documents->year_in_series = $request->year_in_series;

    if ($request->hasFile('doc_file')) {
        // Delete the old file if it exists
        $file_existing = documents::findOrFail($id);
        $file = $request->file('doc_file');
        if(Storage::delete("/files//".$file_existing->file_name)){
        // Store the new file
        $file = $request->file('doc_file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('/files', $fileName);
        $documents->file_name = $fileName;
        }else{
            return response()->json(['status' => 0, 'error' => 'Failed To Delete']);
        }
    }else{
        return response()->json(['status' => 0, 'error' => 'No File']);
    }
    
    //$documents->save();
    $blotters = documents::where('id',$id)->update(
        [
            'id' => $id,
            'title' => $request->doc_title,
            'sponsored' => $request->doc_author,
            'co_sponsored' => $request->doc_co_author,
            'description' => $request->doc_description,
            'date_published' => $request->date_published,
            'file_name' => $documents->file_name,
            'type' => $request->doc_type,
            'subject_matter' => $request->doc_subject_matter,
            'year_in_series' => $request->year_in_series,
        ]
        );

    return response()->json(['success' => 'Document updated successfully.','status' => $blotters]);
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

    foreach ($request->documents as $document) {
        $fileName = $document['file']->getClientOriginalName();
        $filePath = $document['file']->storeAs('/files', $fileName);

        documents::create([
            'title' => $document['title'],
            'type' => $document['type'],
            'sponsored' => $document['author'],
            'co_sponsored' => $document['co_author'] ?? 'N/A',
            'description' => $document['description'] ?? 'N/A',
            'date_published' => $document['date_published'],
            'file_name' => $fileName,
            'subject_matter' => $document['date_published'],
            'year_in_series'=> $document['year_in_series'],

        ]);
    }

    return response()->json(['message' => 'Documents uploaded successfully']);
}
    public function downloadPDF($id)
        {
            $file = documents::findOrFail($id);
            echo $file->file_name;
            $filePath = storage_path('app\\public\files\\'.$file->file_name);
            //$filePath = preg_replace('\\\', '\\', $filePath);

            if (file_exists($filePath)) {
             return response()->file($filePath,[
                    'Cache-Control' => 'no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0'
                ]);
               // return response()->file($filePath);
            } else {
                //return redirect()->back()->with('error', 'The file does not exist.');
                return response()->json(['failed' => $filePath]);
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
    $currentYear = date('Y');
    
    $ordinances = Documents::where('type', 'ordinance')
        ->whereYear('date_published', $currentYear)
        ->count();
    
    $resolutions = Documents::where('type', 'resolution')
        ->whereYear('date_published', $currentYear)
        ->count();
    
    return response()->json([
        'ordinances' => $ordinances,
        'resolutions' => $resolutions
    ]);
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