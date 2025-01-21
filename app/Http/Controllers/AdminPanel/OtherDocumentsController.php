<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherDocument;

use Illuminate\Support\Facades\Storage;

class OtherDocumentsController extends Controller
{
    public function index()
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        $userId = session('user.id');
        $documents = OtherDocument::where('uploaded_by', $userId)
            ->latest()
            ->paginate(10);
        return view('pages.AdminPanel.other-documents.other', compact('documents'));
    }

    public function create()
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        return view('pages.AdminPanel.other-documents.create');
    }

  
    public function store(Request $request)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx,txt,xlsx |max:10240'
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/other-documents', $fileName);

        OtherDocument::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $fileName,
            'uploaded_by' => session('user.id')
        ]);

        return redirect()->route('other-documents.index')
            ->with('success', 'Document added successfully');
    }

    public function edit($id)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }

        $document = OtherDocument::findOrFail($id);
        
        // Check if user is the uploader
        if ($document->uploaded_by != session('user.id')) {
            return redirect()->route('other-documents.index')
                ->with('error', 'Unauthorized access');
        }

        return view('pages.AdminPanel.other-documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }

        $document = OtherDocument::findOrFail($id);

        // Check if user is the uploader
        if ($document->uploaded_by != session('user.id')) {
            return redirect()->route('other-documents.index')
                ->with('error', 'Unauthorized access');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240'
        ]);

        if ($request->hasFile('file')) {
            Storage::delete('public/other-documents/' . $document->file_path);
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/other-documents', $fileName);
            $document->file_path = $fileName;
        }

        $document->title = $request->title;
        $document->description = $request->description;
        $document->save();

        return redirect()->route('other-documents.index')
            ->with('success', 'Document updated successfully');
    }

    public function destroy($id)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }

        $document = OtherDocument::findOrFail($id);

        // Check if user is the uploader
        if ($document->uploaded_by != session('user.id')) {
            return redirect()->route('other-documents.index')
                ->with('error', 'Unauthorized access');
        }

        Storage::delete('public/other-documents/' . $document->file_path);
        $document->delete();

        return redirect()->route('other-documents.index')
            ->with('success', 'Document deleted successfully');
    }

    public function download($id)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }

        $document = OtherDocument::findOrFail($id);

        // Check if user is the uploader
        if ($document->uploaded_by != session('user.id')) {
            return redirect()->route('other-documents.index')
                ->with('error', 'Unauthorized access');
        }

        return Storage::download('public/other-documents/' . $document->file_path);
    }
    
}