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
use App\NewsCategory;
use App\News;
use App\TourGuideLang;
use App\User;
class TrainingCourseController extends Controller
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
      $tc_banner1 =json_decode($option->tc_banner1);
      $tc_banner2 =json_decode($option->tc_banner2);
      $tc_banner3 =json_decode($option->tc_banner3);
    //  dd($tc_banner1[0]->image);
//dd($site_training_courses);
 	    $site_training_course_image =json_decode($option->site_training_course_image);
      $all_tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();

      $tourguides = DB::table("tour_guides")->where('locale', session('locale'))->paginate(10);

      $tourguides_hot = DB::table("tour_guides")->where('hot_tourguide',1)->where('locale_source_id', 0)->take(3)->get();
      $first_10_tourguide =  DB::table('tour_guides')->where('locale', session('locale'))->take(10)->get();

      $more_tour_guide = DB::table('tour_guides')->where('locale', session('locale'))->where('id', '>=', 10)->get();

      $cities = DB::table('cities')->orderBy('name')->get(['name']);
      $languages = DB::table('languages')->orderBy('language')->get(['language']);
      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      $training_course = News::where('locale', session('locale'))->where('type','trainingcourse')->orderBy('id', 'desc')->get();
            for ($i=0; $i < count($training_course) ; $i++) { 
        # code...
        $training_course_metadata[$i] = json_decode($training_course[$i]->metadata);
        $training_course[$i]->hot =  $training_course_metadata[$i]->hot;
      }
      $training_course = $training_course->where('hot',1);
    //  dd($training_course);
       
     
      return view('fontend.trainingcourse.training-course',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","tc_category","js_category","training_course","tc_banner1","tc_banner2","tc_banner3"));
    	
    }
    public function search(Request $request){
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
      $tc_banner1 =json_decode($option->tc_banner1);
      $tc_banner2 =json_decode($option->tc_banner2);
      $tc_banner3 =json_decode($option->tc_banner3);
  
      $site_training_course_image =json_decode($option->site_training_course_image);
      $all_tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();

      $tourguides = DB::table("tour_guides")->where('locale', session('locale'))->paginate(10);

      $tourguides_hot = DB::table("tour_guides")->where('hot_tourguide',1)->where('locale_source_id', 0)->take(3)->get();
      $first_10_tourguide =  DB::table('tour_guides')->where('locale', session('locale'))->take(10)->get();

      $more_tour_guide = DB::table('tour_guides')->where('locale', session('locale'))->where('id', '>=', 10)->get();

      $cities = DB::table('cities')->orderBy('name')->get(['name']);
      $languages = DB::table('languages')->orderBy('language')->get(['language']);
      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      $training_course = News::where('locale', session('locale'))->where('type','trainingcourse')->where('status','publish')->orderBy('id', 'desc')->take(3)->get();

      $trainingcourse = News::where('locale', session('locale'))->where('type','trainingcourse')->where('status','publish')->orderBy('id', 'desc')->get();
      $searched =[];
      $key_word = $request->input('key_word');
            if ($key_word != null) {
            for ($i=0; $i < count($trainingcourse) ; $i++) { 
                $title[$i] =$trainingcourse[$i]->title;
               $content[$i] = strip_tags(html_entity_decode($trainingcourse[$i]->content));
                $content[$i] = strtolower( $content[$i]);
                $title[$i] = strtolower( $title[$i]);
                if (strpos($title[$i], $key_word) !== false || strpos($content[$i], $key_word) !== false) {
                  $searched[$i] =$trainingcourse[$i];
                  $searched[$i]->description =strip_tags($trainingcourse[$i]->content);
                }
            }
           }
           if(!empty($searched)){
            $i =0;
            foreach ($searched as $item) {
              # code...
              $a[$i] = $item;
              $i++;
            }
            $newArr = array('item' => $a );
            $searched = json_encode($newArr);
          }
        else
          $searched=null;
     //dd($searched);
       return view('fontend.trainingcourse.training-course-search',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","tc_category","js_category","training_course","tc_banner1","tc_banner2","tc_banner3","searched"));
    }
    public function detail(Request $request,$id){
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

      
        return view('fontend.trainingcourse.training-course-detail',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","tc_category","js_category","training_course","tc_banner1","tc_banner2","tc_banner3","searched","related_trainingcourse","trainingcourse","tc_banner1","tc_banner2","tc_banner3"));
    }
    public function category(Request $request, $key){
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
      $tc_banner1 =json_decode($option->tc_banner1);
      $tc_banner2 =json_decode($option->tc_banner2);
      $tc_banner3 =json_decode($option->tc_banner3);
    //  dd($tc_banner1[0]->image);
//dd($site_training_courses);
      $site_training_course_image =json_decode($option->site_training_course_image);
      $all_tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();

      $tourguides = DB::table("tour_guides")->where('locale', session('locale'))->paginate(10);

      $tourguides_hot = DB::table("tour_guides")->where('hot_tourguide',1)->where('locale_source_id', 0)->take(3)->get();
      $first_10_tourguide =  DB::table('tour_guides')->where('locale', session('locale'))->take(10)->get();

      $more_tour_guide = DB::table('tour_guides')->where('locale', session('locale'))->where('id', '>=', 10)->get();

      $cities = DB::table('cities')->orderBy('name')->get(['name']);
      $languages = DB::table('languages')->orderBy('language')->get(['language']);
      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();

      $training_course = News::where('locale', session('locale'))->where('type','trainingcourse')->where('',$key)->orderBy('id', 'desc')->take(3)->get();
      return view('fontend.trainingcourse.training-course',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","tc_category","js_category","training_course","tc_banner1","tc_banner2","tc_banner3"));
    }
}
