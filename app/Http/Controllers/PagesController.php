<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
      $title = 'Home'; 
      //return view('Pages.index',compact('title'));
      return view('Pages.index')->with('title',$title);

    }

    public function about()
    {
      $title = 'about us'; 
      return view('Pages.about')->with('title',$title);
    }
    public function services()
    {
      $data = array
      (
       'title'=> 'Services',
        'services'=>['UI','UX Design','Devops','SEO']  
      ); 
      return view('Pages.services')->with($data);
    }
    
}
