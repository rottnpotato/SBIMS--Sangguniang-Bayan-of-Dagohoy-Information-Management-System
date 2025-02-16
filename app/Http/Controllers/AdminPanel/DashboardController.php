<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;

//Models
use App\Models\brgy_official;
use App\Models\area_setting;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        
        return view('pages.AdminPanel.dashboard');
    }
}



