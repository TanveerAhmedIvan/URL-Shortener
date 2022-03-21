<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shorturl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Routing\UrlGenerator;


class ShorturlController extends Controller
{
    //
    protected $url;
    public function __construct(UrlGenerator $url)
    {
        $this->middleware('guest');
        $this->url = $url;
    }
    
    function create(Request $request){
        $this->validate($request, [ 
            'url' => 'required|url',
        ]);
        $url = $request->input('url');
        if($url[strlen($url)-1] != '/'){
            $url .= '/';
        }
        $shortURL = DB::table('shorturls')->where('url', $url)->first();
        if(!empty($shortURL->code)){
            $randomString = $shortURL->code;
        }else{
            $postData = new Shorturl;
            $postData->url = $url;
            $randomString = $this->randomString();
            $postData->code = $randomString;
            $postData->save();
        }
        $shorturl =  $this->url->to('/'.$randomString);
        
        return view('welcome')->with('shorturl',$shorturl);
    }
    private function randomString(){
        $true = TRUE;
        do{
            $randomString = Str::random(6);
            $shortURL = DB::table('shorturls')->where('code', $randomString)->first();
            if(empty($shortURL->code)){
                $true = FALSE;
            }
        }while($true);
        return $randomString;
    }
    function home($urlData){
        $shortURL = DB::table('shorturls')->where('code', $urlData)->first();
        if(!empty($shortURL->code)){
            $shorturl =  $shortURL->url;
            return redirect($shorturl);
        }else{
            return redirect()->route('welcome');
        }
        
        
    }
}
