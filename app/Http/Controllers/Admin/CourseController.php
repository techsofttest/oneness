<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coursesnew;
use App\Models\Usernew;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


use App\Models\Addmorevideos;

class CourseController extends Controller
{


    

    public function index()
    {
        $courses = Coursesnew::all();

        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
     

        return view('admin.course.create');
    }

    public function edit(string $id)
    {

    $data['course'] = DB::table('coursesnews')
    ->where('id', $id)->first();

    $data['videos'] = DB::table('coursesnews_videos')
        ->where('c_parent_id', $id)
        ->get();

    return view('admin.course.edit',$data);

    }

    
    



    public function store(Request $request)
    {
        
        // Prepare input data excluding unwanted fields
        
        $input=$request->except('_token','_url', '_method','c_parent_id','c_title','video','c_titlein_id','videoin_old');

        $cleanInput = strip_tags($input['title']);

        $slug = Str::slug($cleanInput);

        // Convert the first letter to uppercase
        $input['slug'] = ucfirst($slug);
       



        if($image = $request->file('image'))
        {
            $dest_path = 'uploads/course';


            

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

     
         $project = Coursesnew::create($input);
         $id = $project->id;


         if ($request->filled('c_title') || $request->filled('video')) {

            $videosData = [];

            $titles = $request->input('c_title', []);
            $vimeo_id = $request->input('video', []);

        // Check if a file was uploaded for this index
        /*
        if (isset($files[$index]) && $files[$index]->isValid()) {
            $file = $files[$index];

            $destPath = 'videos';
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $file->getClientOriginalName());

            //$file->move(public_path($destPath), $filename);

            //$videoPath = $destPath . '/' . $filename;
            $videoPath = $file->storeAs('videos', $filename); 
        }
        */

            foreach ($titles as $index => $title) {

            DB::table('coursesnews_videos')->insert([
                'c_parent_id' => $id,
                'c_title'     => $title,
                'video'       => $vimeo_id[$index],
                'created_at'  => now(),
                'updated_at'  => now()
            ]);

            }
       

        }

        /*
        if (!empty($videosData)) {
        $project->video = json_encode($videosData);
        $project->save();
        }
        */

        return redirect()->back()->with('success',' Inserted Successfully');
    }

    public function update(Request $request, string $id)
    {

        $input=$request->except('_token','_url', '_method','c_parent_id','c_title','video','c_titlein_id','videoin_old','id');


          $id=preg_replace('/[^0-9]/', '', $id);
        //Fetch Existing Record
        $existingrecord = Coursesnew::where('id', $id)->first();

         $cleanInput = strip_tags($input['title']);

        $slug = Str::slug($cleanInput);

        // Convert the first letter to uppercase
        $input['slug'] = ucfirst($slug);


        if($image = $request->file('image'))
        {
            $dest_path = 'uploads/course';

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



        if ($request->filled('c_title') || $request->hasFile('video')) {

    $videosData = [];

    $titles = $request->input('c_title', []);
    $vimeo_id = $request->input('video', []);

    foreach ($titles as $index => $title) {
        $videoPath = null;

        // Check if file uploaded and valid
        /*
        if (isset($files[$index]) && $files[$index]->isValid()) {
            $file = $files[$index];
            $destPath = 'videos';
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $file->getClientOriginalName());
            $videoPath = $file->storeAs('videos', $filename);
        }
        */

         // Insert only if title or video exists
            if (!empty($title)) {
                DB::table('coursesnews_videos')->insert([
                    'c_parent_id' => $id,
                    'c_title' => $title,
                    'video' => $vimeo_id[$index],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
    }
   
    }

        
        Coursesnew::where('id', $id)->update($input);



        /*
          $titles1 = $request->input('c_titlein_old');
        if ($titles1) {
            foreach ($titles1 as $recordId2 => $title) {
                Addmorevideos::where('id', $recordId2)
                                ->update(['c_title' => $title]);
            }
        }
        */
        
        
        /*
          $answers = $request->input('videoin_old');
        if ($answers) {
            foreach ($answers as $recordId3 => $answer) {
                Addmorevideos::where('id', $recordId3)
                                ->update(['video' => $answer]);
            }
        }
        */


// 2. INSERT new inclusions
/*
$newTitles = $request->input('c_title', []);
$newDescriptions = $request->input('video', []);

$newInclusions = [];
foreach ($newTitles as $index => $title) {
    $desc = $newDescriptions[$index] ?? '';
    if (!empty($title) || !empty($desc)) {
        $newInclusions[] = [
            'c_parent_id' => $id, // assuming $d_id is passed to this method
            'c_title' => $title,
            'video' => $desc,
        ];
    }
}
*/


        return redirect()->back()->with('success',' Updated Successfully');
    }



    public function destroy(string $id)
    {
        $image = Coursesnew::find($id);

        if ($image && $image->image) {
            $existingImagePath ='uploads/course/' . $image->image;
        
            if (file_exists($existingImagePath) && !is_dir($existingImagePath)) {
                unlink($existingImagePath);
            }
        }

        if ($image && $image->content) {
            $description = $image->content;
    
            // Use regex to extract image URLs from the description
            preg_match_all('/<img[^>]+src="([^">]+)"/', $description, $matches);
    
            if (!empty($matches[1])) {
                foreach ($matches[1] as $imageUrl) {
                    // Convert the URL to a file path
                    $imagePath = public_path(str_replace(asset(''), '', $imageUrl));
    
                    // Check and delete the file
                    if (file_exists($imagePath) && !is_dir($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        }
       

       
       
        
        Coursesnew::where('id',$id)->delete();


        return redirect()->back()->with('success',' Deleted Successfully ');

    }


public function viewVideo($id)
{
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login to view the course.');
    }

    if ($user->status !== 'active') {
        return redirect()->route('home')->with('error', 'Your account is not active. Please contact support.');
    }

    $course = Coursesnew::findOrFail($id);

    // ⏰ Restrict by access time
    $now = now();
    if ($course->access_start && $now->lt($course->access_start)) {
        return back()->with('error', 'Video access is not yet available.');
    }

    if ($course->access_end && $now->gt($course->access_end)) {
        return back()->with('error', 'Video access has expired.');
    }

    // 🌍 IP / Location / OS Restriction - Custom logic (see next section)
    if (!$this->isAllowedAccess()) {
        return back()->with('error', 'Access denied due to location or device restrictions.');
    }

    return view('admin.course.view', compact('course'));
}


 public function delete2($id)
    {
        
       
       

       
        
        Addmorevideos::where('id',$id)->delete();


        return redirect()->back()->with('success',' Deleted Successfully ');

    }



public function deleteVideo($courseId,$videoId)
{
    $video = DB::table('coursesnews_videos')->where('id', $videoId)->first();

    if (!$video) {
        return back()->with('error', 'Video not found.');
    }

    // Delete file if exists
    if (!empty($video->video)) {
        // If file is in storage
        if (Storage::exists($video->video)) {
            Storage::delete($video->video);
        }
        // If file is in public path
        elseif (file_exists(public_path($video->video))) {
            unlink(public_path($video->video));
        }
    }

    // Delete DB record
    DB::table('coursesnews_videos')->where('id', $videoId)->delete();

    return back()->with('success', 'Video deleted successfully.');
}



    public function ExpireStatus($id)
    {

    $course = Coursesnew::findOrFail($id);

    //$status = $request->status; // should be 'active', 'blocked', or 'pending'

    if ($course->expiring_soon==0) {
        $status = 1;
    }
    else
    {
        $status = 0;
    }

    $course->expiring_soon = $status;

    $course->save();


    return back()->with('success', 'Updated successfully.');

}




}
