<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$records = Company::orderby('name','asc')->get();
        //return Company::where('name','Eva')->get();
         //$records = DB::select('select * from companies');
        //$records = Company::orderBy('name','asc')->paginate(1); // pagination
        $records = Company::all();
        return view('companies.index')->with('records', $records);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required',
           'email'=> 'required',
           'website'=>'required',
           'cover_image'=> 'image|nullable|max:1999' 
        ]);

        // File uploading 

        if($request->hasFile('cover_image'))
        {
        // Display Filename with extension
        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename 
        $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // FileName to store
        $fileNameToStore = $filename. '_'.time(). '.'.$extension; 
        // Upload image
        $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }
        else
        {
          $fileNameToStore = 'noimage.jpg';  
        }
        // Create a company

        $Company = new Company;
        $Company->name = $request->input('name');
        $Company->email = $request->input('email');
        $Company->website = $request->input('website');
        $Company->cover_image = $fileNameToStore;
        $Company->save();
        return redirect('/company')->with('success','Company Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Company::find($id);
        return view('companies.show')->with('record', $record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Company::find($id);
        return view('companies.edit')->with('record', $record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=> 'required',
            'website'=>'required' 
         ]);
         // Handle File upload 
         if($request->hasFile('cover_image'))
         {
         // Display Filename with extension
         $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
         // Get just filename 
         $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
         // Get just extension
         $extension = $request->file('cover_image')->getClientOriginalExtension();
         // FileName to store
         $fileNameToStore = $filename. '_'.time(). '.'.$extension; 
         // Upload image
         $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
 
         }
         
         // Update a company
 
         $Company = Company::find($id);
         $Company->name = $request->input('name');
         $Company->email = $request->input('email');
         $Company->website = $request->input('website');
         if($request->hasFile('cover_image'))
         {
         $Company->cover_image = $fileNameToStore;
         }    
         $Company->save();
         return redirect('/company')->with('success','Company Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Company = Company::find($id);
        $Company->delete();
        return redirect('/company')->with('success','Company Removed');
    }
}
