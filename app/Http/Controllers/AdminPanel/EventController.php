<?php
namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    { 
        
        return Event::all();
    } 

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'committees' => 'required',
            'end' => 'nullable|date|after:start',
            'description' => 'nullable|string',
        ]);

        // Convert committees string to array
        //$validatedData['committees'] = explode(',', $validatedData['committees']);

        $event = Event::create($validatedData);

        // Format the response to match the client-side expectation
        //$event->committees = implode(',', $event->committees);

        return $event;
    }

    public function update(Request $request)
    {
        $event = Event::findOrFail($request->id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'committees' => 'required|array',
            'end' => 'nullable|date|after:start',
            'description' => 'nullable|string',
        ]);

        // Convert committees string to array
        //$validatedData['committees'] = explode(',', $validatedData['committees']);

        $event->update($validatedData);

        // Format the response to match the client-side expectation
        //$event->committees = implode(',', $event->committees);

        return $event;
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(['message' => 'Event deleted successfully']);
    }
}