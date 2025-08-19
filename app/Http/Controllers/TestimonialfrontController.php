<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Videotestimonial;
use App\Models\Clinicvideo;
use App\Models\Testimonial;
use App\Models\Page;
use App\Models\Contact;


class TestimonialfrontController extends Controller
{
    public function index()
    {

         $data['page_seo'] = Seo::find(1);
        $data['contact'] = Contact::find(1);


   $data['home_testimonial'] = Testimonial::get();

   $data['home_clinicvideo'] =   Clinicvideo::get();

    $data['home_video'] =   Videotestimonial::get();


    $data['home_content9'] = Page::find(9);
     $data['home_content10'] = Page::find(10);
       $data['home_content11'] = Page::find(11);

         return view('testimonial',$data);

    }
}