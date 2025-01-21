<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\sb_members;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Font;

class CommitteeController extends Controller
{
    public function index(Request $request)
    {
        $userType = $request->input('userType', '');

        if ($userType === 'SBmember') {
            // Get committees for SBmember
            $userId = session()->get('user.id');
            $committees = sb_members::where('id', $userId)
                ->whereNotNull('committee')
                ->pluck('committee')
                ->map(function ($committee) {
                    return ['id' => $committee, 'name' => $committee];
                });
        } else {
            // Get all committees for other user types
            $committees = sb_members::select('committee as id', 'committee as name')
                ->whereNotNull('committee')
                ->groupBy('committee')
                ->get()
                ->unique('name')
                ->values();
        }

        return response()->json($committees);
    } 

    public function getUserData()
    {
        $user = session()->get('user');
        $userType = $user['type'] ?? 'other';
        $userData = [
            'userType' => $userType,
            'name1' => $user['firstname'],
            'name2' => $user['lastname'],
        ];

        if ($userType === 'SBMember') {
            $committees = sb_members::where('first_name', session()->get('user.firstname'))
                ->where('last_name',session()->get('user.lastname'))
                ->whereNotNull('committee')
                ->pluck('committee')
                ->toArray();
            $userData['committees'] = $committees;
        }

        return response()->json($userData);
    }
}