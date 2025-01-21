<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\sb_members;

//Plugins
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Validator;

class SBController extends Controller
{


    public function client_index(Request $request)
    {
        //$data = blotters::all();
        //eturn Datatables::of($data);
        
    }


    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                "position" => "required",
                "committee" => "required",
                "termStart" => "required",
                "termEnd" => "required",
                "biography" => "required",
                "memberImage" => "required|image|mimes:jpeg,png,jpg,gif|max:7898"
            ]
        );
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            $file = $request->file('memberImage');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('member_images', $fileName);
    
            $member = sb_members::updateOrCreate(
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'position' => $request->position,
                    'committee' => $request->committee,
                    'termStart' => $request->termStart,
                    'termEnd' => $request->termEnd,
                    'biography' => $request->biography,
                    'memberImage' => $fileName
                ]
            );
    
            return response()->json([
                'status' => 'success',
                'message' => 'Member information saved successfully',
                'data' => $member
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving the member information',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function update(Request $request, $id)
    {
        $member = sb_members::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'committee' => 'required|string|max:255',
            'termStart' => 'required|date',
            'termEnd' => 'required|date|after:termStart',
            'biography' => 'nullable|string',
            'memberImage' => 'nullable|image|max:2048',
        ]);

        $member->fill($validatedData);

        if ($request->hasFile('memberImage')) {
            // Delete old image if exists
            if ($member->imageName) {
                sb_members::disk('public')->delete('member_images/' . $member->memberImage);
            }
           // $path = $request->file('memberImage')->store('member_images', 'public');
            //$member->imageName = basename($path);
            $file = $request->file('memberImage');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('member_images', $fileName);
            $member->memberImage = $fileName;
        }

        $member->save();

        return response()->json(['status' => 'success', 'message' => 'Member updated successfully']);
    }


    public function viewMember($id)
{
    $file = sb_members::findOrFail($id);
    $fileLocation = $file->memberImage;
    $filePath = storage_path('app\public\member_images\\' . $fileLocation);
    if (file_exists($filePath)) {
       return response()->json($file);
    } else {
        //return redirect()->back()->with('error', 'The file does not exist.');
        return response()->json(['success' => $filePath]);
    }
}
public function serve($id)
{
    $file = sb_members::findOrFail($id);
    $fileLocation = $file->memberImage;
    $filePath = storage_path('app\public\member_images\\' . $fileLocation);

    if (file_exists($filePath)) {
        $mimeType = mime_content_type($filePath);
        
        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $fileLocation . '"'
        ]);
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }
}

    public function show()
    {
        
        /*if (!session()->has("user")) {
            return redirect("login");
        }*/
        
        //$resident = resident_info::all();
        $members = sb_members::all();
        return response()->json($members);
    }


    public function edit($id)
    {
        /*
        $blotter = blotters::find($id);
        $person_involve = person_involve::where('blotter_id', $blotter->blotter_id)->get();

        return response()->json([$blotter, $person_involve]);*/
    }






    public function destroy($id)
{
    try {
        $member = sb_members::findOrFail($id);
        $member->delete();
        return response()->json(['status' => 'success', 'message' => 'Member deleted successfully']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Failed to delete member'], 500);
    }
}
}
