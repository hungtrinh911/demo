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
use App\TourGuide;
use App\Language;
use App\City;
use App\TourGuideLang;
use App\NewsCategory;
use App\News;
use App\User;
use Illuminate\Support\Facades\Route;

class TravelBlogController extends Controller
{
    public function index(Request $request)
    {
    	//dd($request->method());
    	// dd(Route::getCurrentRoute()->getMethod());
    	 //dd(session()->all());

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
       //dd(1);
      $option->site_keywords = implode(',', json_decode($option->site_keywords));
 	    $site_multi_address=json_decode($option->site_multi_address);
      $slides_guide_profile = json_decode($option->site_logos);
      $slides_top = json_decode($option->site_slide);
      $site_tourguides = json_decode($option->site_tourguide);
      $site_training_courses =json_decode($option->site_training_course);
      $site_job_search =json_decode($option->site_job_search);
      $site_faqs = json_decode($option->site_faqs);
      $site_numbers= json_decode($option->site_number);
      $site_contact_us = json_decode($option->site_contact_us);
      $site_guide_profile =json_decode($option->site_guide_profile);
      $site_review =json_decode($option->site_review);
      $js_top_employer =json_decode($option->js_top_employer);
      $js_left_image =json_decode($option->js_left_image);
      $js_banner =json_decode($option->js_banner);
      $tb_banner =json_decode($option->tb_banner);
      //dd($tb_banner);
//dd($site_training_courses);
 	    $site_training_course_image =json_decode($option->site_training_course_image);
      $all_tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();

      $tourguides = DB::table("tour_guides")->where('locale', session('locale'))->paginate(10);

      $tourguides_hot = DB::table("tour_guides")->where('hot_tourguide',1)->where('locale_source_id', 0)->take(3)->get();
      $first_10_tourguide =  DB::table('tour_guides')->where('locale', session('locale'))->take(10)->get();

      $more_tour_guide = DB::table('tour_guides')->where('locale', session('locale'))->where('id', '>=', 10)->get();

      $cities = DB::table('cities')->orderBy('name')->get(['name']);
      $languages = DB::table('languages')->orderBy('language')->get(['language']);
      $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      $travelblog_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      $travelblog = News::where('locale', session('locale'))->where('type','news')->where('status','publish')->paginate(10);
      $travelslide = News::where('locale', session('locale'))->where('type','news')->where('status','publish')->orderBy('id', 'desc')->get();

      $travelleft_id = NewsCategory::where('locale', session('locale'))->where('slug','khuyen-mai')->pluck('id');
  	  $travelleft_id = $travelleft_id->first();
      //dd($travelleft_id);
  	  $travelleft_id = DB::table('terms_things')->where('term_id',$travelleft_id)->get();
  	  for ($i=0; $i <count($travelleft_id) ; $i++) { 
  	  	# code...
  	  	$travelleft_id[$i] = News::where('locale', session('locale'))->where('type','news')->where('id',$travelleft_id[$i]->thing_id)->where('status','publish')->first();
  	  }
     // dd($travelleft_id);
      $travelblog = News::where('locale', session('locale'))->where('type','news')->where('status','publish')->get();

      for ($i=0; $i <count($travelblog) ; $i++) { 
      	# code...
      	$blog = User::where('id',$travelblog[$i]->author)->pluck('name');
      	$blog = $blog->first();
      	$travelblog[$i]->author_name = $blog;
      }
      
     // dd($travelblog);
      $travelblog_metadata = News::where('locale', session('locale'))->where('type','news')->where('status','publish')->pluck('metadata');
      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      for ($i=0; $i <count($travelblog_metadata) ; $i++) { 
      	# code...
      	$travelblog_metadata[$i] = json_decode($travelblog_metadata[$i]);
      }
       $metadata =[];
       $hotslide =[];
      for ($i=0; $i < count($travelslide) ; $i++) { 
            $metadata[$i] = $travelslide[$i]->metadata;
            $metadata[$i] = json_decode($metadata[$i]);
            $metadata[$i]->id = $travelslide[$i]->id;
             if($metadata[$i]->hot ==0)
              $metadata[$i] =null;
            else
              $metadata[$i] = $metadata[$i]->id;
          }

          if ($metadata!=null) {
            # code...
              for ($i=0; $i <count($metadata) ; $i++) { 
               $hot_employer[$i] = News::where('locale', session('locale'))->where('type','news')->where('status','publish')->where('id',$metadata[$i])->first();
              }
             $hotslide = array_filter($hot_employer);
          }
         // dd($hotslide);
          $travelblog = json_encode($travelblog);
      $employees =[1,2];
      return view('fontend.travel-blog',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","travelblog_category","tc_category","employees","travelblog","js_top_employer","js_left_image","js_banner","travelslide","travelleft_id","tb_banner","js_category","hotslide"));
    	
    }
    public function detail(Request $return,$id){

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
       //dd(1);
      $option->site_keywords = implode(',', json_decode($option->site_keywords));
      $site_multi_address=json_decode($option->site_multi_address);
      $slides_guide_profile = json_decode($option->site_logos);
      $slides_top = json_decode($option->site_slide);
      $site_tourguides = json_decode($option->site_tourguide);
      $site_training_courses =json_decode($option->site_training_course);
      $site_job_search =json_decode($option->site_job_search);
      $site_faqs = json_decode($option->site_faqs);
      $site_numbers= json_decode($option->site_number);
      $site_contact_us = json_decode($option->site_contact_us);
      $site_guide_profile =json_decode($option->site_guide_profile);
      $site_review =json_decode($option->site_review);
      $js_top_employer =json_decode($option->js_top_employer);
      $js_left_image =json_decode($option->js_left_image);
      $js_banner =json_decode($option->js_banner);
      $site_training_course_image =json_decode($option->site_training_course_image);
      $all_tourguides = [];
      $tourguides =[];
      $tourguides_hot = [];
      $first_10_tourguide =  [];
      $more_tour_guide = [];
      $cities = DB::table('cities')->orderBy('name')->get(['name']);
      $languages = DB::table('languages')->orderBy('language')->get(['language']);
      $jobsearch_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      $jobsearch_metadata = News::where('locale', session('locale'))->where('type','jobsearch')->where('status','publish')->pluck('metadata');
      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      $tc_banner1 =json_decode($option->tc_banner1);
      $tc_banner2 =json_decode($option->tc_banner2);
      $tc_banner3 =json_decode($option->tc_banner3);
      $travelleft_id = NewsCategory::where('locale', session('locale'))->where('slug','khuyen-mai')->pluck('id');
      $travelleft_id = $travelleft_id->first();
      //dd($travelleft_id);
      $travelleft_id = DB::table('terms_things')->where('term_id',$travelleft_id)->get();
      for ($i=0; $i <count($travelleft_id) ; $i++) { 
        # code...
        $travelleft_id[$i] = News::where('locale', session('locale'))->where('type','news')->where('id',$travelleft_id[$i]->thing_id)->where('status','publish')->first();
      }
      for ($i=0; $i <count($jobsearch_metadata) ; $i++) { 
        # code...
        $jobsearch_metadata[$i] = json_decode($jobsearch_metadata[$i]);
      }

      $trainingcourse = News::where('id',$id)->first();
      if ($trainingcourse->locale_source_id != 0) {
          if (session('locale')=='vi') {
              $trainingcourse= News::where('locale',session('locale'))->where('id',$id)->orWhere('locale_source_id',$id)->first();
          }
          elseif (session('locale')=='en'){
             $trainingcourse = News::where('locale',session('locale'))->get();
             $trainingcourse = $trainingcourse->where('id',$id)->first();
             if ($trainingcourse == null) {
               # code...
               $trainingcourse = News::where('locale_source_id',$id)->first();
             }
           }
       }
      $author_id = User::where('id',$trainingcourse->author)->pluck('name');
      $trainingcourse->author_name = $author_id->first();
      $terms_id = DB::table('terms_things')->where('thing_id',$trainingcourse->id)->pluck('term_id');
      $things_id = DB::table('terms_things')->where('term_id',$terms_id->first())->pluck('thing_id');
      if (count($things_id) != 0) {
        # code...
          for ($i=0; $i <count($things_id) ; $i++) { 
            $related_trainingcourse[$i] = News::where('id',$things_id[$i])->whereNotIn('id', [$id])->first();
          }
         $related_trainingcourse =  array_filter($related_trainingcourse);
      }
      else
        $related_trainingcourse =[];

      
        return view('fontend.travelblog.travel-blog-detail',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","tc_category","js_category","training_course","tc_banner1","tc_banner2","tc_banner3","searched","related_trainingcourse","trainingcourse","tc_banner1","tc_banner2","tc_banner3","travelleft_id"));
    }
    
}
