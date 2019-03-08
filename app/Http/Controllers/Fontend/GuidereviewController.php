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

class GuidereviewController extends Controller
{
    //
    public function index(Request $request){
     // dd(is_int(4));
      //dd (is_int(TourGuide::totalpoint()));
      // $star = json_decode(DB::table('tour_guides')->where('id',30)->pluck('metadata'));
      // $star = json_decode($star[0]);
      // dd($star);
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


      $all_tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();

      $tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();

      $tourguides_hot = DB::table("tour_guides")->where('locale', session('locale'))->where('hot_tourguide',1)->get();
      $first_10_tourguide =  DB::table('tour_guides')->where('locale', session('locale'))->take(10)->get();
      $last_id =0;
      for ($i=0; $i < count($first_10_tourguide) ; $i++) { 
        # code...
          $last_id= $first_10_tourguide[$i]->id;

      }
      $more_tour_guide = DB::table('tour_guides')->where('locale', session('locale'))->where('id', '>=', $last_id)->get();
    //  dd(empty($more_tour_guide));
     // dd($tourguides);
      $tourguides = json_encode($tourguides);
     // dd($tourguides);
      $cities = DB::table('cities')->orderBy('name')->get(['name']);
      $languages = DB::table('languages')->orderBy('language')->where('locale', session('locale'))->get(['language']);

      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
      $tourguidespg = DB::table("tour_guides")->where('locale', session('locale'))->paginate(10);
      return view('fontend.guidereview.guidereview',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","tc_category","js_category","tourguidespg"));
  }

  public function detail(Request $request, $id){
    // $name = $request->input('name');
    // dd($name);
    $morelanguages = DB::table('tour_guides')->where('id',$id)->pluck('languages')->first();
    $morecre = DB::table('tour_guides')->where('id',$id)->pluck('certificate')->first();
    $morelanguages = explode(',',$morelanguages);
    $morecre = explode(',',$morecre);
    //dd(explode(',',$morelanguages));
     $list = DB::table('font_end_things')->where('locale','')->orWhere('locale', session('locale'))->get();
       $multilang = new \stdClass();
       foreach ($list as $item) {
        $multilang->{$item->key_t} = $item->value;
       }
    $options = DB::table("options")->get();
    $lst = Option::where('locale', '')->orWhere('locale', session('locale'))->get();
    $option = new \stdClass();
    foreach ($lst as $item) {
      $option->{$item->key} = $item->value;
    }
    $option->site_keywords = implode(',', json_decode($option->site_keywords));

    $site_faqs = json_decode($option->site_faqs);
    $site_numbers= json_decode($option->site_number);
    $site_contact_us = json_decode($option->site_contact_us);


    $tourguide = DB::table('tour_guides')->where('id',$id)->first();
    
   
    $tourguide_locale = $tourguide->locale_source_id;
    $tourguide = TourGuide::where('id',$id)->first();
      if ($tourguide->locale_source_id != 0) {
          if (session('locale')=='vi') {
              $tourguide= TourGuide::where('locale',session('locale'))->where('id',$id)->orWhere('locale_source_id',$id)->first();
             // dd(1);
          }
          elseif (session('locale')=='en'){
             // $tourguide = TourGuide::where('locale',session('locale'))->get();
             // 
             $tourguide = TourGuide::where('locale',session('locale'))->where('id',$id)->first();
             
             if ($tourguide == null) {
                $tourguide = TourGuide::where('locale_source_id',29)->get();
               // dd($tourguide);
             }
           }
       }
   
    $locale_1 = $tourguide->locale_1;
    $locale_2 = $tourguide->locale_2;

    $locale_1 = explode(';',($locale_1));
    $locale_2 = explode(';',($locale_2));
    $tourguide_fieldname = DB::table('field_guides')->where('locale',session('locale'))->distinct()->pluck('name');
    $tourguide_fieldvalue = DB::table('field_guides')->where('locale',session('locale'))->distinct()->pluck('value');
    for ($i=0; $i < count($tourguide_fieldname) ; $i++) { 
     $tourguide_all_field[$i]=DB::table('field_guides')->where('name',$tourguide_fieldname[$i])->where('locale',session('locale'))->get();

     }
     $tourguide_field =  DB::table('tour_guide_fields')->where('id_tourguide',$id)->where('locale',session('locale'))->pluck('id_fields');
     $tourguide_field = $tourguide_field->implode("," );
     $tourguide_role=  DB::table('tour_guide_roles')->where('id_tourguide',$id)->where('locale',session('locale'))->pluck('id_roles');
     for ($i=0; $i < count($tourguide_role); $i++) { 
       $tourguide_role[$i]=DB::table('role_guides')->where('id',$tourguide_role[$i])->where('locale',session('locale'))->pluck('name');
     }
     $tourguide_lang=  DB::table('tour_guide_langs')->where('id_tourguide',$id)->where('locale',session('locale'))->pluck('id_language');
     for ($i=0; $i < count($tourguide_lang); $i++) { 
       $tourguide_lang[$i]=DB::table('languages')->where('id',$tourguide_lang[$i])->where('locale',session('locale'))->pluck('language');
     }
     $tourguide_certificate =  DB::table('tour_guide_certificate')->where('id_tourguide',$id)->where('locale',session('locale'))->pluck('id_certificates');

     for ($i=0; $i < count($tourguide_certificate); $i++) { 
       $tourguide_certificate[$i]=DB::table('certificate_guides')->where('id',$tourguide_certificate[$i])->where('locale',session('locale'))->pluck('name');
     }
        $comments = DB::table('form_submissions')->where('type','comment')->where('status',1)->get();
        for ($i=0; $i < count($comments); $i++) { 
            $comments[$i] = json_decode($comments[$i]->metadata);
        }
      //  dd($comments);
       
       // dd($tourguide_locale);
       // $firstcomments=null;
        $firstcomments = $comments->where('tourguide_id',$id)->where('status',1)->take(3)->toArray();
        //dd(is_array($firstcomments));
        if (empty($firstcomments)) {
          # code...
        //  dd(1);
           $firstcomments = $comments->where('tourguide_id',$tourguide_locale)->where('status',1)->take(3);
        }

        $morecomments0 = $comments->where('tourguide_id',$id)->where('status',1)->toArray();
        $morecomments1 = $comments->where('tourguide_id',$tourguide_locale)->where('status',1)->toArray();
        //$key_number = $morecomments1->key;
        //dd(is_array($morecomments0));
         $morecomments =array_merge($morecomments0, $morecomments1);
      
               
       // dd($morecomments);
              $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
        $js_category = NewsCategory::where('locale', session('locale'))->where('type','jobsearch_category')->get();
        //dd($morecomments);

    return view('fontend.guidereview.guidereview-detail',compact("option","options","site_faqs","site_numbers","site_contact_us","tourguide_fieldname","tourguide_all_field","tourguide_field","tourguide_role","tourguide_certificate","tourguide_lang","tourguide","firstcomments","morecomments","multilang","tc_category","js_category","locale_1","locale_2","morelanguages","morecre"));
  }

    public function addComment (Request $request ,$id){
         $validator = Validator::make($request->all(), [
            'comment_name' => 'required|max:255',
            'comment_email' => 'required|email',
            'comment_phone' => 'required|max:20'
        ]);
        if ($validator->fails()) {
             alert()->error('vui lòng xem lại thông tin', 'Thất bại');
             return back()->withInput();
        }

       $comment = new FormSubmission();
       $name = $request->input('comment_name');
       $email = $request->input('comment_email');
       $phone = $request->input('comment_phone');
       $content = $request->input('comment_content');
       $comment->type = 'comment';
       $comment->name =$name;
       $comment->email =$email;
       $comment->phone =$phone;
       // {"comment":"tour guide nhu cut vote 1*","status":"pending" ,"tourguide_id":1,"name":"Trinh Viet Hung","email":"hungtrinh@gmail.com","phone":"01242972979","id":1}
       $comments = ["name" => $name,"email"=>$email ,"phone"=>$phone ,"comment"=>$content,"status"=>0,"tourguide_id"=>$id ];
       
       $comment->metadata = json_encode($comments);
      // dd($comment);
        $flag = false;
        $comment->save();
        $comments = ["name" => $name,"email"=>$email ,"phone"=>$phone ,"comment"=>$content,"status"=>0,"tourguide_id"=>$id ,'id' =>$comment->id];
        $comment->metadata = json_encode($comments);
        $flag = $comment->update();
        if( $flag )
        {
            alert()->success('Thành công', 'cảm ơn bạn đã bình chọn');
            return back()->withInput();
        }

    }
    public function vote(Request $request , $id){
        $name = $request->input('score');
        $star = $name[0];
        $star1 = $name[1];
        $star2 = $name[2];
        $star3 = $name[3];
        $star4 = $name[4];
        $star5 = $name[5];

        $newstar =[$star, $star1 , $star2, $star3,$star4, $star5];
        $oldstar = json_decode(DB::table('tour_guides')->where('id',$id)->pluck('metadata'));
        $oldstar = json_decode($oldstar[0]);
        if ($oldstar != null) {
        for ($i=0; $i < count($oldstar) ; $i++) { 
          $newstar[$i] = ($oldstar[$i]+ $newstar[$i])/2;
            }     
        }
        $tourguide_star = TourGuide::findOrFail($id);
      //  dd($tourguide_star);
        if ($tourguide_star->locale_source_id != 0) {
          # code...
          $tourguide_locale = TourGuide::where('id',$tourguide_star->locale_source_id)->first();
        }
        else
          $tourguide_locale = TourGuide::where('locale_source_id',$tourguide_star->id)->first();
       // dd($tourguide_locale);
       // dd($tourguide_locale);
      //  dd($newstar);
        $newstar = json_encode($newstar);
        $tourguide_star->metadata = $newstar;
        if($tourguide_locale != null){
          $tourguide_locale->metadata = $newstar;
          $tourguide_locale->save();
        }
        $flag= false;
        $flag=$tourguide_star->save();
        if($flag)
        {
           alert()->success('cảm ơn bạn đã bình chọn', 'Thành công');
            return back()->withInput();
        }
        else
          alert()->error('vui lòng xem lại thông tin', 'Thất bại');
             return back()->withInput();
      
    }
    public function search(Request $request ){
    
      //dd(count($request->all()));
      $tg=[];
      $tourguide_searched =[];
      $lang = $request->input('language');
      $provincial = $request->input('provincial');
      $key_word = $request->input('key_word');
      /*search theo key word*/
     if ($key_word!=null && $lang == null && $provincial == null) {
        $tourguide_searched = DB::table('tour_guides')->where('name',$key_word)->where('locale', session('locale'))->get()->toArray();
        //dd(is_array($tourguide_searched));
        for ($i=0; $i < count($tourguide_searched) ; $i++) { 
          $tourguide_searched[$i] = $tourguide_searched[$i];
        }
      }
     /*search theo ngon ngu*/
      elseif ($key_word ==null && $lang != null && $provincial == null) {
        $id_lang =DB::table('languages')->where('language',$lang)->pluck('id');
        $tourguide_lang = DB::table('tour_guide_langs')->where('id_language',$id_lang)->where('locale', session('locale'))->pluck('id_tourguide');
        for ($i=0; $i <count($tourguide_lang) ; $i++){ 
            $tourguide_searched[$i] = DB::table('tour_guides')->where('id',$tourguide_lang[$i])->where('locale', session('locale'))->first();
        }
      }
     /*search theo dia diem*/ 
      elseif ($key_word==null && $lang==null && $provincial!=null) {
        $tourguide =TourGuide::where('city',$provincial)->where('locale', session('locale'))->get();
        for ($i=0; $i <count($tourguide) ; $i++){ 
            $tourguide_searched[$i] =$tourguide[$i];
        }
      }
      /*search theo 2 phuong thuc dia diem va key_word*/
      elseif ($key_word !=null && $lang == null && $provincial != null) {
        $tourguide =TourGuide::where('name',$key_word)->where('name',$key_word)->where('locale', session('locale'))->get();
     
        for ($i=0; $i <count($tourguide) ; $i++){ 
            $tourguide_searched[$i] = $tourguide[$i];
        }
      }
    
      /*search theo 2 phuong thuc dia diem va ngon ngu*/
      elseif ($key_word ==null &&$lang != null && $provincial != null) {
        $id_lang =DB::table('languages')->where('language',$lang)->pluck('id');
        $tourguide_lang = DB::table('tour_guide_langs')->where('id_language',$id_lang)->where('locale', session('locale'))->pluck('id_tourguide');
        //dd($tourguide_searched[0]);
        //dd($tourguide_lang);
        $tourguide =TourGuide::where('city',$provincial)->where('locale', session('locale'))->get();
       // dd(TourGuide::where('city',$provincial)->where('id',)->get());
        for($j =0 ;$j < count($tourguide_lang);$j++){
          //for ($i=0; $i <count($tourguide) ; $i++){ 
                $tourguide_searched[$j] = TourGuide::where('city',$provincial)->where('id',$tourguide_lang[$j])->where('locale', session('locale'))->first();
        }
        $tourguide_searched = array_filter($tourguide_searched);
      }
      /*search theo key_word va ngon ngu*/
       elseif ($key_word !=null && $lang != null && $provincial == null) {
        $id_lang =DB::table('languages')->where('language',$lang)->pluck('id');
        $tourguide_lang = DB::table('tour_guide_langs')->where('id_language',$id_lang)->where('locale', session('locale'))->pluck('id_tourguide');
        $tourguide =TourGuide::where('name',$key_word)->where('locale', session('locale'))->get();
      
        for($j =0 ;$j < count($tourguide_lang);$j++){
                $tourguide_searched[$j] = TourGuide::where('name',$key_word)->where('id',$tourguide_lang[$j])->where('locale', session('locale'))->first();
        }
        $tourguide_searched = array_filter($tourguide_searched);
      }
      /*search theo ca 3 phuong thuc*/
      elseif($key_word !=null && $lang != null && $provincial != null){
        $id_lang =DB::table('languages')->where('language',$lang)->pluck('id');
        $tourguide_lang = DB::table('tour_guide_langs')->where('id_language',$id_lang)->where('locale', session('locale'))->pluck('id_tourguide');
        $tourguide =TourGuide::where('name',$key_word)->where('city',$provincial)->where('locale', session('locale'))->get();
      // dd($tourguide);
        for($j =0 ;$j < count($tourguide_lang);$j++){
          $tourguide_searched[$j] =TourGuide::where('name',$key_word)->where('city',$provincial)->where('id',$tourguide_lang[$j])->where('locale', session('locale'))->first();
        }
        $tourguide_searched = array_filter($tourguide_searched);
      }
      else{
         $tourguide_searched = $tg;
      }
     // dd($tourguide_searched);

  // dd($tourguide);
// dd($tourguide_searched);
      /**/

//dd($tourguide_searched);
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
      $all_tourguides = DB::table("tour_guides")->where('locale', session('locale'))->get();
      $tourguides = DB::table("tour_guides")->where('locale', session('locale'))->paginate(10);
      $tourguides_hot = DB::table("tour_guides")->where('hot_tourguide',1)->where('locale_source_id', 0)->take(3)->get();
      $first_10_tourguide =  DB::table('tour_guides')->where('locale', session('locale'))->take(10)->get();
      $more_tour_guide = DB::table('tour_guides')->where('locale', session('locale'))->where('id', '>=', 10)->get();
      $cities = DB::table('cities')->orderBy('name')->get(['name']);
      $languages = DB::table('languages')->orderBy('language')->where('locale', session('locale'))->get(['language']);
      $tc_category = NewsCategory::where('locale', session('locale'))->where('type','tc_category')->get();
      if(count($request->all()) != 0)
      {
      return view('fontend.guidereview.guidereview-search',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","tc_category","tourguide_searched"));
      }
     else
      return view('fontend.guidereview.guidereview-search',compact("option","options","slides_guide_profile","slides_top","site_tourguides","site_training_courses","site_job_search","site_faqs","site_numbers","site_contact_us","site_guide_profile","tourguides","tourguides_hot","cities","languages","all_tourguides","first_10_tourguide","more_tour_guide","multilang","tc_category","tourguide_searched"));
      }


}
