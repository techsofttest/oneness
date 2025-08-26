<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Coursesnew;
use App\Models\Page;
use App\Models\Clinicvideo;
use App\Models\Testimonial;
use App\Models\Videotestimonial;

class HomeController extends Controller
{
    public function index()
    {
        $data['page_seo'] = Seo::find(1);
        $data['contact'] = Contact::find(1);

          $data['home_banner'] = Banner::get();
        
        $data['home_testimonial'] = Testimonial::get();

       $data['home_clinicvideo'] =   Clinicvideo::get();

    $data['courses_all'] = Coursesnew::latest()->get();

       $data['home_video'] =   Videotestimonial::get();

                $data['home_about'] = Page::find(1);

                   $data['home_why1'] = Page::find(2);
                  $data['home_why2'] = Page::find(3);
                  $data['home_why3'] = Page::find(4);
                   $data['home_why4'] = Page::find(5);
                   $data['home_why5'] = Page::find(6);
                   $data['home_why6'] = Page::find(7);

                        $data['home_content'] = Page::find(8);

                         $data['home_content9'] = Page::find(9);
                          $data['home_content10'] = Page::find(10);
                           $data['home_content11'] = Page::find(11);

          $data['training'] = Page::find(8);
        
        return view('index',$data);
    }

}