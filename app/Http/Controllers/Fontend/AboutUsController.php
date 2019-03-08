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

class AboutUsController extends Controller
{
    //
    public function index(Request $request){

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
      $trainingcourse =  News::where('locale', session('locale'))->where('type','trainingcourse')->orderBy('id', 'desc')->take(3)->get();
       $aboutus = DB::table('options')->where('description','aboutus')->pluck('value')->first();
      // dd($aboutus);

      return view('fontend.aboutus.about-us',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","multilang","site_training_course_image","tc_category","js_category","trainingcourse","tc_banner1","tc_banner2","tc_banner3","aboutus"));

    	
    }
}
