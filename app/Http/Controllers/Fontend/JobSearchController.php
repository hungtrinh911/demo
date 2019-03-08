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
use Illuminate\Support\Facades\Route;
use App\User;

class JobSearchController extends Controller
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
        $all_tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();
        $tourguides = DB::table("tour_guides")->where('locale', session('locale'))->paginate(10);
        $tourguides_hot = DB::table("tour_guides")->where('hot_tourguide',1)->where('locale_source_id', 0)->take(3)->get();
        $first_10_tourguide =  DB::table('tour_guides')->where('locale', session('locale'))->take(10)->get();
        $more_tour_guide = DB::table('tour_guides')->where('locale', session('locale'))->where('id', '>=', 10)->get();
        $cities = DB::table('cities')->orderBy('name')->get(['name']);
        $languages = DB::table('languages')->orderBy('language')->get(['language']);
        $jobsearch_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
        $jobsearch = News::where('locale', session('locale'))->where('type','jobsearch')->where('status','publish')->paginate(4);
        $jobsearch_metadata = News::where('locale', session('locale'))->where('type','jobsearch')->where('status','publish')->pluck('metadata');
        $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
        $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
        for ($i=0; $i <count($jobsearch_metadata) ; $i++) { 
        	# code...
        	$jobsearch_metadata[$i] = json_decode($jobsearch_metadata[$i]);
        }
       $metadata =[];
       $jobseachhot = News::where('locale', session('locale'))->where('type','jobsearch')->get();
         for ($i=0; $i < count($jobseachhot) ; $i++) { 
            $random[$i] = $jobseachhot[$i]->metadata;
            $random[$i] = json_decode($random[$i]);
            $random[$i]= $jobseachhot[$i]->id; 
          }
          if(!empty($random)){
            if (count($random)>4) {
              $rand_keys = array_rand($random, 4);
              for ($i=0; $i <count($rand_keys) ; $i++) { 
                $randomValue[$i] = $random[$rand_keys[$i]];
              }
              for ($i=0; $i <count($randomValue) ; $i++) { 
                $randomjob[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$randomValue[$i])->first();
              }
            }
            else{
              for ($i=0; $i <count($random) ; $i++) { 
                $randomjob[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$random[$i])->first();
              }
            }

          }
          else $randomjob =[];
          //dd(($randomjob)!=null);
          for ($i=0; $i < count($jobseachhot) ; $i++) { 
            $metadata[$i] = $jobseachhot[$i]->metadata;
            $metadata[$i] = json_decode($metadata[$i]);
            $metadata[$i]->id = $jobseachhot[$i]->id;
             if($metadata[$i]->hot ==0)
              $metadata[$i] =null;
            else
              $metadata[$i] = $metadata[$i]->id;
          }
          if ($metadata!=null) {
            # code...
              for ($i=0; $i <count($metadata) ; $i++) { 
               $hot_employer[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$metadata[$i])->first();
              }
             $hot_employer = array_filter($hot_employer);
          }
          else $hot_employer=[];
         //dd( $hot_employer);
        
     //  dd($jobsearch);
      
      $employees =[1,2];
      return view('fontend.jobsearch.jobsearch',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","jobsearch_category","tc_category","employees","jobsearch","js_top_employer","js_left_image","js_banner","js_category","hot_employer","randomjob"));
    	
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
          $jobsearch = News::where('locale', session('locale'))->where('type','jobsearch')->where('status','publish')->paginate(4);
          $jobsearch_metadata = News::where('locale', session('locale'))->where('type','jobsearch')->where('status','publish')->pluck('metadata');
           $jobseachhot = News::where('locale', session('locale'))->where('type','jobsearch')->get();
          $metadata =[];
          $jobseachhot = News::where('locale', session('locale'))->where('type','jobsearch')->get();
         for ($i=0; $i < count($jobseachhot) ; $i++) { 
            $random[$i] = $jobseachhot[$i]->metadata;
            $random[$i] = json_decode($random[$i]);
            $random[$i]= $jobseachhot[$i]->id; 
          }
          if(!empty($random)){
            if (count($random)>4) {
              $rand_keys = array_rand($random, 4);
              for ($i=0; $i <count($rand_keys) ; $i++) { 
                $randomValue[$i] = $random[$rand_keys[$i]];
              }
              for ($i=0; $i <count($randomValue) ; $i++) { 
                $randomjob[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$randomValue[$i])->first();
              }
            }
            else{
              for ($i=0; $i <count($random) ; $i++) { 
                $randomjob[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$random[$i])->first();
              }
            }

          }
          else $randomjob =[];
          //dd(($randomjob)!=null);
          for ($i=0; $i < count($jobseachhot) ; $i++) { 
            $metadata[$i] = $jobseachhot[$i]->metadata;
            $metadata[$i] = json_decode($metadata[$i]);
            $metadata[$i]->id = $jobseachhot[$i]->id;
             if($metadata[$i]->hot ==0)
              $metadata[$i] =null;
            else
              $metadata[$i] = $metadata[$i]->id;
          }
          if ($metadata!=null) {
            # code...
              for ($i=0; $i <count($metadata) ; $i++) { 
               $hot_employer[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$metadata[$i])->first();
              }
             $hot_employer = array_filter($hot_employer);
          }
          else $hot_employer=[];

          $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
          $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
          for ($i=0; $i <count($jobsearch_metadata) ; $i++) { 
            # code...
            $jobsearch_metadata[$i] = json_decode($jobsearch_metadata[$i]);
          }
          $searched =[];
          $key_word = mb_strtolower($request->input('key_word'),'UTF-8');
         
          $category = strtolower($request->input('category'));
          $city = strtolower($request->input('city'));
          $job = News::where('locale', session('locale'))->where('type','jobsearch')->where('status','publish')->get();

          if ($key_word != null && $category == null && $city ==null) {
            for ($i=0; $i < count($job) ; $i++) { 
             
                $title[$i] =$job[$i]->title;
                $excerpt[$i]=$job[$i]->excerpt;
                $content[$i] = strip_tags(html_entity_decode($job[$i]->content));
             //   dd($content[$i]);
                $content[$i] = mb_strtolower($content[$i],'UTF-8');
                $title[$i] = mb_strtolower($title[$i],'UTF-8');
                $excerpt[$i] = mb_strtolower($excerpt[$i],'UTF-8');

                if (strpos($title[$i], $key_word) !== false || strpos($content[$i], $key_word) !== false || strpos($excerpt[$i],$key_word) !== false) {
                  $searched[$i] =$job[$i];
                  $searched[$i]->description =strip_tags($job[$i]->content);
                }
            }
           }

        /*search theo category*/
          elseif ($key_word == null && $category != null && $city ==null) {
                $terms_id = NewsCategory::where('locale',session('locale'))->where('name',$category)->pluck('id');
                $things = DB::table('terms_things')->where('term_id',$terms_id)->get();
                for ($i=0; $i <count($things) ; $i++) { 
                  $searched[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$things[$i]->thing_id)->where('status','publish')->first();
                }
            }
          /*search theo city*/
          elseif ($key_word == null && $category == null && $city != null) {
             for ($i=0; $i < count($job) ; $i++) { 
                $tags_place[$i] = json_decode($job[$i]->metadata);
                $tags[$i] =$tags_place[$i]->tags_place;
                //dd($tags[$i][0]);
                $tags[$i] = strtolower($tags[$i]);
                $j = 0;
                  if ($tags[$i] == $city ) {
                    $searched[$i] =$job[$i];
                    $searched[$i]->description =strip_tags($job[$i]->content);
                  }
              }
          }
          /*search theo city + key_word*/
           elseif ($key_word != null && $category == null && $city != null) {
                     for ($i=0; $i < count($job) ; $i++) { 
                       $title[$i] =$job[$i]->title;
                        $excerpt[$i]=$job[$i]->excerpt;
                        $content[$i] = strip_tags(html_entity_decode($job[$i]->content));
                     //   dd($content[$i]);
                        $content[$i] = mb_strtolower($content[$i],'UTF-8');
                        $title[$i] = mb_strtolower($title[$i],'UTF-8');
                        $excerpt[$i] = mb_strtolower($excerpt[$i],'UTF-8');

                        $tags_place[$i] = json_decode($job[$i]->metadata);
                        $tags[$i] = $tags_place[$i]->tags_place;
                        $tags[$i] = strtolower($tags[$i]);
                        $j = 0;
                          if ($tags[$i] == $city && ( strpos($title[$i], $key_word) !== false || strpos($content[$i], $key_word) !== false || strpos($excerpt[$i],$key_word) !== false)) {
                          $searched[$i] =$job[$i];
                          $searched[$i]->description =strip_tags($job[$i]->content);
                        }
                      }
                   
                }
          /*key_word + cate*/
           elseif ($key_word != null && $category != null && $city == null) {
               $terms_id = NewsCategory::where('locale',session('locale'))->where('name',$category)->pluck('id');
               $things = DB::table('terms_things')->where('term_id',$terms_id)->get();
              for ($i=0; $i <count($things) ; $i++) { 
                $searched[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$things[$i]->thing_id)->where('status','publish')->first();
              }
              for ($i=0; $i < count($searched) ; $i++) { 
                $title[$i] =$job[$i]->title;
                $excerpt[$i]=$job[$i]->excerpt;
                $content[$i] = strip_tags(html_entity_decode($job[$i]->content));
             //   dd($content[$i]);
                $content[$i] = mb_strtolower($content[$i],'UTF-8');
                $title[$i] = mb_strtolower($title[$i],'UTF-8');
                $excerpt[$i] = mb_strtolower($excerpt[$i],'UTF-8');

                if (strpos($title[$i], $key_word) !== false || strpos($content[$i], $key_word) !== false || strpos($excerpt[$i],$key_word) !== false) {
                  $searched[$i] =$job[$i];
                  $searched[$i]->description =strip_tags($job[$i]->content);
                }
                else
                  $searched[$i] = null;
              }
             $searched =  array_filter($searched);
            }
            /*city + cate*/
           elseif ($key_word == null && $category != null && $city != null) {
               $terms_id = NewsCategory::where('locale',session('locale'))->where('name',$category)->pluck('id');
               $things = DB::table('terms_things')->where('term_id',$terms_id)->get();
              for ($i=0; $i <count($things) ; $i++) { 
                $searched[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$things[$i]->thing_id)->where('status','publish')->first();
                $tags_place[$i] = json_decode($searched[$i]->metadata);
                $tags[] =$tags_place[$i]->tags_place;
                $tags[$i] = strtolower($tags[$i]);
                }
              for ($i=0; $i < count($searched) ; $i++) { 
                if ($tags[$i] == $city ){
                  $searched[$i] =$searched[$i];
                  $searched[$i]->description =strip_tags($searched[$i]->content);
                }
                else
                  $searched[$i] = null;
              }
             $searched =  array_filter($searched);
            }

            /*ca 3*/
            elseif ($key_word != null && $category != null && $city != null) {
              
               $terms_id = NewsCategory::where('locale',session('locale'))->where('name',$category)->pluck('id');
               $things = DB::table('terms_things')->where('term_id',$terms_id)->get();
              
              for ($i=0; $i <count($things) ; $i++) { 
                # code...
                $searched[$i] = News::where('locale', session('locale'))->where('type','jobsearch')->where('id',$things[$i]->thing_id)->where('status','publish')->first();
              
                $tags_place[$i] = json_decode($searched[$i]->metadata);
               // dd($tags_place);
                $tags[] =$tags_place[$i]->tags_place;
                $tags[$i] = strtolower($tags[$i]);
                }
              for ($i=0; $i < count($searched) ; $i++) { 
                 $title[$i] =$searched[$i]->title;
                $content[$i] = strip_tags(html_entity_decode($searched[$i]->content));
                $content[$i] = strtolower( $content[$i]);
                $title[$i] = strtolower( $title[$i]);
                if ($tags[$i] == $city && (strpos($title[$i], $key_word) !== false || strpos($content[$i], $key_word) !== false)){
                  $searched[$i] =$searched[$i];
                  $searched[$i]->description =strip_tags($searched[$i]->content);
                }
                else
                  $searched[$i] = null;
              }
             $searched =  array_filter($searched);
            }         
        // dd($searched);
          /*end*/   
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
          $employees =[1,2];
          //dd($searched);
        return view('fontend.jobsearch.jobsearch-search',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","jobsearch_category","tc_category","employees","jobsearch","js_top_employer","js_left_image","js_banner","js_category","searched","hot_employer","randomjob"));
    }

    public function jobsearchdetail(Request $request ,$id){

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
      for ($i=0; $i <count($jobsearch_metadata) ; $i++) { 
        # code...
        $jobsearch_metadata[$i] = json_decode($jobsearch_metadata[$i]);
      }
      $jobsearch = News::where('id',$id)->first();
      if ($jobsearch->locale_source_id != 0) {
        # code...
          if (session('locale')=='vi') {
              $jobsearch= News::where('locale',session('locale'))->where('id',$id)->orWhere('locale_source_id',$id)->first();
          }
          elseif (session('locale')=='en'){
             $jobsearch = News::where('locale',session('locale'))->get();
             $jobsearch = $jobsearch->where('id',$id)->first();
             if ($jobsearch == null) {
               # code...
               $jobsearch = News::where('locale_source_id',$id)->first();
             }
          }
      }

      // if($request->has('lang') && $jobsearch->locale_source_id == 0) {
      //   if (session('locale')=='vi') {
      //     $jobsearch= News::where('locale',session('locale'))->where('id',$id)->orWhere('locale_source_id',$id)->first();
      //   }
      //   $jobsearch = News::where('locale_source_id',$id)->first();
      // }
      // elseif ($request->has('lang') && $jobsearch->locale_source_id != 0) {
      //   $jobsearch = News::where('id',$jobsearch->locale_source_id)->first();
      // }

      $author_id = User::where('id',$jobsearch->author)->pluck('name');
      $jobsearch->author_name = $author_id->first();
      $terms_id = DB::table('terms_things')->where('thing_id',$jobsearch->id)->pluck('term_id');
      $things_id = DB::table('terms_things')->where('term_id',$terms_id->first())->pluck('thing_id');
    //  dd($things_id);
      $related_jobsearch=[];
      if($things_id != null){
      for ($i=0; $i <count($things_id) ; $i++) { 
        # code...
       $related_jobsearch[$i] = News::where('id',$things_id[$i])->whereNotIn('id', [$id])->first();

      }
       $related_jobsearch =  array_filter($related_jobsearch);
      }
      else 
        $related_jobsearch= null;
      $employees =[1,2];
      return view('fontend.jobsearch.jobsearch-detail',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","site_training_course_image","site_multi_address","site_review","jobsearch_category","tc_category","employees","jobsearch","js_top_employer","js_left_image","js_banner","js_category","related_jobsearch"));
      

    }


}
