<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Clinicvideo;

use Illuminate\Support\Str;

class ClinicvideoController extends Controller
{
    public function index()
    {
        $clinicvideo = Clinicvideo::all();
                    

        return view('admin.clinicvideo.index', compact('clinicvideo'));
    }

    public function create()
    {
     

        return view('admin.clinicvideo.create');
    }

    public function edit(string $id)
    {
        $clinicvideo = Clinicvideo::find($id);
            
      


        return view('admin.clinicvideo.edit', compact('clinicvideo'));
    }

    
    



    public function store(Request $request)
    {
        
        // Prepare input data excluding unwanted fields
        
        $input=$request->except('_token','_url', '_method');

       
       



        
        Clinicvideo::create($input);


        return redirect()->back()->with('success',' Inserted Successfully');
    }

    public function update(Request $request, string $id)
    {

        $input=$request->except('_token','_url', '_method');


          $id=preg_replace('/[^0-9]/', '', $id);
        //Fetch Existing Record
        $existingrecord = Clinicvideo::where('id', $id)->first();

       


      
       

        
        Clinicvideo::where('id', $id)->update($input);


        return redirect()->back()->with('success',' Updated Successfully');
    }

    public function destroy(string $id)
    {
     
        
        Clinicvideo::where('id',$id)->delete();


        return redirect()->back()->with('success',' Deleted Successfully ');

    }

}
