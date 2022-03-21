<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    protected $url;
    //
    public function __construct()
    {
        
    }
    function index(){
        $shorturl =  '';
        return view('welcome')->with('shorturl',$shorturl);
    }
}
