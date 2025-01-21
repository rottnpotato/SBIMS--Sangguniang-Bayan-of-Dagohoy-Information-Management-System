<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{ 
    public function resident_home(){

       /* if (!session()->has("resident")) {
            return redirect("/management/login");
        } */

        return view('pages.ClientSide.userdashboard.homepage');
    }

    public function resident_news(){
    /* if (!session()->has("resident")) {
            return redirect("/management/login");
        } */

        return view('pages.ClientSide.userdashboard.news');
    }
    public function docs(){

      /*  if (!session()->has("resident")) {
            return redirect("/management/login");
        } */

        return view('pages.ClientSide.userdashboard.docs');
    }

    public function info(){
        
        /* if (!session()->has("resident")) {
            return redirect("/management/login");
        } */
        return view('pages.ClientSide.userdashboard.info');
    }
    public function schedules(){
        
        /* if (!session()->has("resident")) {
            return redirect("/management/login");
        } */
        return view('pages.ClientSide.userdashboard.schedule');
    }
}
