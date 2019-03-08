<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\FormSubmission;
use Alert;
use Validator;
use App\Multilang;
use Auth;
use App\NewsCategory;
use App\News;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {

    	$options = DB::table("options")->get();
 		  $lst = Option::where('locale', '')->orWhere('locale', session('locale'))->get();
      $option = new \stdClass();
      foreach ($lst as $item) {
          $option->{$item->key} = $item->value;
      }
      $list = DB::table('font_end_things')->where('locale','')->orWhere('locale', session('locale'))->get();
      $multilang = new \stdClass();
      foreach ($list as $item) {
       $multilang->{$item->key_t} = $item->value;
      }
      $option->site_keywords = implode(',', json_decode($option->site_keywords));
    	$slides_guide_profile = json_decode($option->site_logos);
    	$slides_top = json_decode($option->site_slide);
    	$site_tourguides = json_decode($option->site_tourguide);
    	$site_training_courses =json_decode($option->site_training_course);
    	$site_job_search =json_decode($option->site_job_search);
    	$site_faqs = json_decode($option->site_faqs);
      $site_numbers= json_decode($option->site_number);
    	$site_contact_us = json_decode($option->site_contact_us);
      $site_guide_profile =json_decode($option->site_guide_profile);
      $site_training_course_image =json_decode($option->site_training_course_image);
      $tc_banner1 =json_decode($option->tc_banner1);
      $tc_banner2 =json_decode($option->tc_banner2);
      $tc_banner3 =json_decode($option->tc_banner3);
    //  $site_training_course_image =
      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      // $trainingcourse =  News::where('locale', session('locale'))->where('type','trainingcourse')->orderBy('id', 'desc')->take(3)->get();
      $trainingcourse = News::where('locale', session('locale'))->where('type','trainingcourse')->orderBy('id', 'desc')->get();
            for ($i=0; $i < count($trainingcourse) ; $i++) { 
        # code...
        $trainingcourse_metadata[$i] = json_decode($trainingcourse[$i]->metadata);
        $trainingcourse[$i]->hot =  $trainingcourse_metadata[$i]->hot;
      }
      $trainingcourse = $trainingcourse->where('hot',1);
     // dd(session('locale'));
      
      return view('index',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","multilang","site_training_course_image","tc_category","js_category","trainingcourse","tc_banner1","tc_banner2","tc_banner3"));
    }

    public function addContactUs (Request $request ){
         $validator = Validator::make($request->all(), [
            'contact_name' => 'required|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|max:20'
        ]);
        if ($validator->fails()) {
             alert()->error('vui lòng xem lại thông tin', 'Thất bại');
             return back()->withInput();
        }

       $contact = new FormSubmission();
       $name = $request->input('contact_name');
       $email = $request->input('contact_email');
       $phone = $request->input('contact_phone');
       $content = $request->input('contact_content');
       $contact->type = 'contact';
       $contact->name =$name;
       $contact->email =$email;
       $contact->phone =$phone;
       $contacts = ["name" => $name,"email"=>$email ,"phone"=>$phone ,"content"=>$content];
       $contact->metadata = json_encode($contacts);
        $flag = false;
        $flag =$contact->save();
       if( $flag )
       {
            alert()->success('', 'Thành công');
            return back()->withInput();
        }
    }


}
