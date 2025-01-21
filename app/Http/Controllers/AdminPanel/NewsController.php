<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\NewsItem;
use App\Models\resident_info;
use App\Models\person_involve;
//Plugins
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
   
    public function index()
    {
        $newsItems = NewsItem::orderBy('created_at', 'desc')->get();
        //return view('pages.AdminPanel.certificate', compact('newsItems'));
        return response()->json($newsItems);
    }

    public function serve($id)
{
    $file = NewsItem::findOrFail($id);
    $fileLocation = $file->image;
    $filePath = storage_path('app\public\news_images\\' . $fileLocation);

    if (file_exists($filePath)) {
        $mimeType = mime_content_type($filePath);
        
        return response()->file($filePath, [
            'Cache-Control' => 'no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $fileLocation . '"'
            
        ]);
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'full_content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('news_images', $fileName);
        //$imagePath = $request->file('image')->store('news_images', 'public');

        $newsItem = NewsItem::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'full_content' => $validatedData['full_content'],
            'image' => $fileName,
        ]);

        return response()->json($newsItem);
    }

    public function update(Request $request, $id)
    {
        $newsItem = NewsItem::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'full_content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newsItem->title = $validatedData['title'];
        $newsItem->content = $validatedData['content'];
        $newsItem->full_content = $validatedData['full_content'];
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('news_images', $fileName);
            $newsItem->image = $fileName;
        }

        $newsItem->save();

        return response()->json($newsItem);
    }

    public function destroy($id)
{
    try {
        $newsItem = NewsItem::findOrFail($id);
        $fileLocation = $newsItem->image;
        
        // Delete the database record first
        $newsItem->delete();
        
        // If there's an associated image, delete it
        if ($fileLocation) {
            // Option 1: If the image path is stored as a relative path
            if (Storage::exists($fileLocation)) {
                Storage::delete($fileLocation);
            }
            
            // Option 2: If you need to use the full storage path
            // $filePath = storage_path('app/public/news_images/' . $fileLocation);
            // if (File::exists($filePath)) {
            //     File::delete($filePath);
            // }
        }
        
        return response()->json([
            'success' => true,
            'message' => 'News item deleted successfully'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error deleting news item: ' . $e->getMessage()
        ], 500);
    }
}
    public function show($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        return response()->json($newsItem);
    }
}
