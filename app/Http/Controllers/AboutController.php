<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Courses;
use App\Models\Page;


class AboutController extends Controller
{
    public function index()
    {

          $data['page_seo'] = Seo::find(1);
        $data['contact'] = Contact::find(1);

          $data['home_about'] = Page::find(1);

           $data['home_content'] = Page::find(8);

    $data['home_content9'] = Page::find(9);
     $data['home_content10'] = Page::find(10);
       $data['home_content11'] = Page::find(11);

         return view('about',$data);

    }
}