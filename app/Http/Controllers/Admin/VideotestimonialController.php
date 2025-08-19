<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Videotestimonial;

use Illuminate\Support\Str;

class VideotestimonialController extends Controller
{
    public function index()
    {
        $videotestimonial = Videotestimonial::all();
                    

        return view('admin.videotestimonial.index', compact('videotestimonial'));
    }

    public function create()
    {
     

        return view('admin.videotestimonial.create');
    }

    public function edit(string $id)
    {
        $videotestimonial = Videotestimonial::find($id);
            
      


        return view('admin.videotestimonial.edit', compact('videotestimonial'));
    }

    
    



    public function store(Request $request)
    {
        
        // Prepare input data excluding unwanted fields
        
        $input=$request->except('_token','_url', '_method');

       
       



        
        Videotestimonial::create($input);


        return redirect()->back()->with('success',' Inserted Successfully');
    }

    public function update(Request $request, string $id)
    {

        $input=$request->except('_token','_url', '_method');

          $id=preg_replace('/[^0-9]/', '', $id);
        //Fetch Existing Record
        $existingrecord = Videotestimonial::where('id', $id)->first();

       


      
       

        
        Videotestimonial::where('id', $id)->update($input);


        return redirect()->back()->with('success',' Updated Successfully');
    }

    public function destroy(string $id)
    {
     
        
        Videotestimonial::where('id',$id)->delete();


        return redirect()->back()->with('success',' Deleted Successfully ');

    }

}
