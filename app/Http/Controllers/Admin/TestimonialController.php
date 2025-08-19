<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::all();
                    

        return view('admin.testimonial.index', compact('testimonial'));
    }

    public function create()
    {
     

        return view('admin.testimonial.create');
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::find($id);
            
      


        return view('admin.testimonial.edit', compact('testimonial'));
    }

    
    



    public function store(Request $request)
    {
        
        // Prepare input data excluding unwanted fields
        
        $input=$request->except('_token','_url', '_method');

       
       



        if($image = $request->file('image'))
        {
            $dest_path = 'uploads/testimonial';


            

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

       

        
        Testimonial::create($input);


        return redirect()->back()->with('success',' Inserted Successfully');
    }

    public function update(Request $request, string $id)
    {

        $input=$request->except('_token','_url', '_method');

          $id=preg_replace('/[^0-9]/', '', $id);
        //Fetch Existing Record
        $existingrecord = Testimonial::where('id', $id)->first();

       


        if($image = $request->file('image'))
        {
            $dest_path = 'uploads/testimonial';

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

       

        
        Testimonial::where('id', $id)->update($input);


        return redirect()->back()->with('success',' Updated Successfully');
    }

    public function destroy(string $id)
    {
        $image = Testimonial::find($id);

        if ($image && $image->image) {
            $existingImagePath ='uploads/testimonial/' . $image->image;
        
            if (file_exists($existingImagePath) && !is_dir($existingImagePath)) {
                unlink($existingImagePath);
            }
        }
       
        
        Testimonial::where('id',$id)->delete();


        return redirect()->back()->with('success',' Deleted Successfully ');

    }

}
