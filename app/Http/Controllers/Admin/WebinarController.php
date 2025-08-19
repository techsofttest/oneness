<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Webinar;

use Illuminate\Support\Str;

class WebinarController extends Controller
{
    public function index()
    {
        $webinar = Webinar::all();
                    

        return view('admin.webinar.index', compact('webinar'));
    }

    public function create()
    {
     

        return view('admin.webinar.create');
    }

    public function edit(string $id)
    {
        $webinar = Webinar::find($id);
            
      


        return view('admin.webinar.edit', compact('webinar'));
    }

    
    



    public function store(Request $request)
    {
        
        // Prepare input data excluding unwanted fields
        
        $input=$request->except('_token','_url', '_method');

       
       



        if($image = $request->file('image'))
        {
            $dest_path = 'uploads/webinar';


            

            // Use original name with potential conflict check
            $originalname = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();

            // Remove spaces, brackets, and special characters from filename
            $originalname = preg_replace('/[\s\[\]\(\)-]+/', '_', pathinfo($originalname, PATHINFO_FILENAME));
            $originalname = preg_replace('/[^a-zA-Z0-9_]/', '', $originalname); // Keeps only alphanumeric and underscores
    
            $counter = 1;
            $newfilename = $originalname . '.' . $extension;

            //Check if the file already exist and rename it if necessary
            while(file_exists($dest_path. '/' . $newfilename))
            {
                $newfilename = $originalname . '_' . $counter . '.' . $extension;
                $counter++;
            }
    
            // MOve the file to the destination
            $image->move($dest_path, $newfilename);

            // Store the filename in the input array
            $input['image'] = $newfilename;
        }

       

        
        Webinar::create($input);


        return redirect()->back()->with('success',' Inserted Successfully');
    }

    public function update(Request $request, string $id)
    {

        $input=$request->except('_token','_url', '_method');

        //Fetch Existing Record
        $existingrecord = Webinar::where('id', $id)->first();

       


        if($image = $request->file('image'))
        {
            $dest_path = 'uploads/webinar';

            //Unlunk the existing image if it exists

            if($existingrecord && $existingrecord->image)
            {
                $existingImagePath = $dest_path . '/' . $existingrecord->image;
                if(file_exists($existingImagePath))
                {
                    unlink($existingImagePath);
                }
            }

            // Use original name with potential conflict check
            $originalname = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();

            // Remove spaces, brackets, and special characters from filename
            $originalname = preg_replace('/[\s\[\]\(\)-]+/', '_', pathinfo($originalname, PATHINFO_FILENAME));
            $originalname = preg_replace('/[^a-zA-Z0-9_]/', '', $originalname); // Keeps only alphanumeric and underscores
    
            $counter = 1;
            $newfilename = $originalname . '.' . $extension;

            //Check if the file already exist and rename it if necessary
            while(file_exists($dest_path. '/' . $newfilename))
            {
                $newfilename = $originalname . '_' . $counter . '.' . $extension;
                $counter++;
            }
    
            // MOve the file to the destination
            $image->move($dest_path, $newfilename);

            // Store the filename in the input array
            $input['image'] = $newfilename;
        }

       

        
        Webinar::where('id', $id)->update($input);


        return redirect()->back()->with('success',' Updated Successfully');
    }

    public function destroy(string $id)
    {
        $image = Webinar::find($id);

        if ($image && $image->image) {
            $existingImagePath ='uploads/webinar/' . $image->image;
        
            if (file_exists($existingImagePath) && !is_dir($existingImagePath)) {
                unlink($existingImagePath);
            }
        }
       
        
        Webinar::where('id',$id)->delete();


        return redirect()->back()->with('success',' Deleted Successfully ');

    }

}
