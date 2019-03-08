<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OptionController extends Controller
{
    /**
     * Hiển thị trang cập nhật
     */
    public function showEditForm()
    {
        //dd(session()->all());
        $lst = Option::where('locale', '')->orWhere('locale', session('locale'))->get();
        $option = new \stdClass();
        foreach ($lst as $item) {
            $option->{$item->key} = $item->value;
        }

        $option->site_keywords = implode(',', json_decode($option->site_keywords));
        $option->site_multi_address = implode(',', json_decode($option->site_multi_address));

        $slides_top = json_decode($option->site_slide);
        $site_tourguides = json_decode($option->site_tourguide);
        $site_guide_profiles = json_decode($option->site_guide_profile);
        $site_training_course = json_decode($option->site_training_course);
        $site_job_search = json_decode($option->site_job_search);
        $site_faqs = json_decode($option->site_faqs);
        $site_number = json_decode($option->site_number);
        $site_contact_us = json_decode($option->site_contact_us);
        $site_training_course_image =json_decode($option->site_training_course_image);
        $site_review =json_decode($option->site_review);
        $js_top_employer =json_decode($option->js_top_employer);
        $js_left_image =json_decode($option->js_left_image);
        $js_banner =json_decode($option->js_banner);
        $tb_banner =json_decode($option->tb_banner);
        $tc_banner1 =json_decode($option->tc_banner1);
        $tc_banner2 =json_decode($option->tc_banner2);
        $tc_banner3 =json_decode($option->tc_banner3);

     //  dd($js_banner);
       // dd($site_review);
        // dd($site_training_course_image);
        return view('backend.option.edit')->with(['option'=> $option,
                                                    'slides_top'=>$slides_top,
                                                    'site_tourguides'=>$site_tourguides,
                                                    'site_guide_profiles'=>$site_guide_profiles,
                                                    'site_training_course'=>$site_training_course,
                                                    'site_job_search'=>$site_job_search,
                                                    'site_faqs'=> $site_faqs,
                                                    'site_number' =>$site_number,
                                                    'site_contact_us' =>$site_contact_us,
                                                    'site_training_course_image'=>$site_training_course_image,
                                                    'site_review'=>$site_review,
                                                    'js_top_employer'=>$js_top_employer,
                                                    'js_left_image'=>$js_left_image,
                                                    'js_banner'=>$js_banner,
                                                    'tb_banner'=>$tb_banner,'tc_banner1'=>$tc_banner1,'tc_banner2'=>$tc_banner2,'tc_banner3'=>$tc_banner3 ]);
    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        /*Update*/
        $option = Option::where('key', 'site_slide')->where('locale', session('locale'))->first();
        $site_slide =json_decode($option->value);
         $i = 0;
         $j =$i+4;
         $k =$j+5;
         for ($i=0; $i < count($site_slide); $i++) { 
           $j++;
           $k++;
           $site_slide[$i]->title = $request->input($i);
           $site_slide[$i]->content = $request->input($j);
           $site_slide[$i]->image = $request->input($k);
        }
        $option_update = DB::table('options')->where('key', 'site_slide')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_slide)]);
        $flag = false;
        $flag = $option->update();
        // $option->value = json_encode( $site_slide);
        // $option->save();
        Option::forget('site_slide');
        /*========*/

        $option = Option::where('key', 'site_tourguide')->where('locale', session('locale'))->first();
        $site_tourguide =json_decode($option->value);
         $i = 0;
         $j =$i+19;
         $k =$j+5;
         $m =$k+5;
         for ($i=0; $i < count($site_tourguide); $i++) { 
           $j++;
           $k++;
           $m++;
           $site_tourguide[$i]->title = $request->input($j);
           $site_tourguide[$i]->content = $request->input($k);
           $site_tourguide[$i]->image = $request->input($m);
        }
        $option_update = DB::table('options')->where('key', 'site_tourguide')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_tourguide)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_tourguide');

        /*==========*/
        $option = Option::where('key', 'site_guide_profile')->where('locale', session('locale'))->first();
        $site_guide_profile =json_decode($option->value);
         $i = 0;
         $j =$i+39;
         $k =$i+1004;
         for ($i=1; $i < count($site_guide_profile); $i++) {
           $j++; 
           $site_guide_profile[$i] = $request->input($j);
        }
        for ($i=0; $i <1 ; $i++) { 
             $k++; 
            $site_guide_profile[$i] = $request->input($k);
        }
        $option_update = DB::table('options')->where('key', 'site_guide_profile')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_guide_profile)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_guide_profile');

 //        /*========*/
        $option = Option::where('key', 'site_training_course')->where('locale', session('locale'))->first();
        $site_training_course =json_decode($option->value);
      //  dd($site_training_course);
        $i = 0;
        $j=$i+1999;
        $k =$i+2004;
        $m =$i+2009;
        for ($i=0; $i <count($site_training_course) ; $i++) { 
             $j++;
             $k++;
             $m++; 
             $site_training_course[$i]->title = $request->input($j);
             $site_training_course[$i]->content = $request->input($k);
             $site_training_course[$i]->image = $request->input($m);
        }

        $option_update = DB::table('options')->where('key', 'site_training_course')
                            ->where('locale', session('locale'))
                            ->update(['value' =>json_encode( $site_training_course)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_training_course');


        $option = Option::where('key', 'tc_banner1')->where('locale', session('locale'))->first();
        $tc_banner1 =json_decode($option->value);
        $i = 0;
        $j=$i+304;
        for ($i=0; $i <count($tc_banner1) ; $i++) { 
             $j++;
             $tc_banner1[$i]->image = $request->input($j);
        }
        $option_update = DB::table('options')->where('key', 'tc_banner1')
                            ->where('locale', session('locale'))
                            ->update(['value' =>json_encode( $tc_banner1)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('tc_banner1');

        $option = Option::where('key', 'tc_banner2')->where('locale', session('locale'))->first();
        $tc_banner2 =json_decode($option->value);
        $i = 0;
        $j=$i+334;
        for ($i=0; $i <count($tc_banner2) ; $i++) { 
             $j++;
             $tc_banner2[$i]->image = $request->input($j);
        }
        $option_update = DB::table('options')->where('key', 'tc_banner2')
                            ->where('locale', session('locale'))
                            ->update(['value' =>json_encode( $tc_banner2)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('tc_banner2');

        $option = Option::where('key', 'tc_banner3')->where('locale', session('locale'))->first();
        $tc_banner3 =json_decode($option->value);
        $i = 0;
        $j=$i+364;
        for ($i=0; $i <count($tc_banner3) ; $i++) { 
             $j++;
             $tc_banner3[$i]->image = $request->input($j);
        }
        $option_update = DB::table('options')->where('key', 'tc_banner3')
                            ->where('locale', session('locale'))
                            ->update(['value' =>json_encode( $tc_banner3)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('tc_banner1');


        $option = Option::where('key', 'site_job_search')->where('locale', session('locale'))->first();
        $site_job_search =json_decode($option->value);
         $i = 0;
         $j =$i+2999;
         $k =$j+5;
         $m =$k+5;
         $d =$m+5;
         for ($i=0; $i < count($site_job_search); $i++) { 
           $j++;
           $k++;
           $m++;
           $site_job_search[$i]->description = $request->input($j);
          // $site_job_search[$i]->description = $request->input($d);
           $site_job_search[$i]->content = $request->input($k);
           $site_job_search[$i]->image = $request->input($m);
        }
        $option_update = DB::table('options')->where('key', 'site_job_search')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_job_search)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_job_search');


        $option = Option::where('key', 'site_faqs')->where('locale', session('locale'))->first();
        $site_faqs =json_decode($option->value);
         $i = 0;
         $j =$i+3999;
         $k =$j+5;
      
         for ($i=0; $i < count($site_faqs); $i++) { 
           $j++;
           $k++;
          
           $site_faqs[$i]->title = $request->input($j);
           $site_faqs[$i]->content = $request->input($k);
        }
        $option_update = DB::table('options')->where('key', 'site_faqs')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_faqs)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_faqs');



        $option = Option::where('key', 'site_number')->where('locale', session('locale'))->first();
        $site_number =json_decode($option->value);
         $i = 0;
         $j =$i+4999;
         $k =$j+5;
     
         for ($i=0; $i < count($site_number); $i++) { 
           $j++;
           $k++;
           $m++;
           $site_number[$i]->number = $request->input($j);
           $site_number[$i]->word = $request->input($k);
         
        }
        $option_update = DB::table('options')->where('key', 'site_number')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_number)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_number');


        $option = Option::where('key', 'site_contact_us')->where('locale', session('locale'))->first();
        $site_contact_us =json_decode($option->value);
         $i = 0;
         $j =$i+5999;
         $k =$j+5;
         for ($i=0; $i < count($site_contact_us); $i++) { 
           $j++;
           $k++;
           $m++;
           $site_contact_us[0]= $request->input('9003');
           $site_contact_us[1] = $request->input('9004');
           $site_contact_us[2] = $request->input('9000');
           $site_contact_us[3] = $request->input('9001');
           $site_contact_us[4]= $request->input('9002');
          
        }
        $option_update = DB::table('options')->where('key', 'site_contact_us')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_contact_us)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_contact_us');




        $option = Option::where('key', 'site_training_course_image')->where('locale', session('locale'))->first();
        $site_training_course_image =json_decode($option->value);
      //  dd($request->input('445'));
         for ($i=0; $i < count($site_training_course_image); $i++) { 
           $site_training_course_image[0]= $request->input('444');
           $site_training_course_image[1] = $request->input('445');
          
          
        }
        //dd(json_encode($site_training_course_image));
        //dd($request->input('444'));
        //dd($site_training_course_image);
        $option_update = DB::table('options')->where('key', 'site_training_course_image')
                            ->where('locale', session('locale'))
                            ->update(['value' =>json_encode( $site_training_course_image)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_training_course_image');

/*job search*/




        $option = Option::where('key', 'js_banner')->where('locale', session('locale'))->first();
        $js_banner =json_decode($option->value);
      //  dd($js_banner);
         $i = 0;
         $k =$i+2619;
   //dd($request->input(2620));
         for ($i=0; $i < 1; $i++) { 
           $k++;
           $js_banner[$i]->image = $request->input($k);
         
        }
        $option_update = DB::table('options')->where('key', 'js_banner')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $js_banner)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('js_banner');
/*travel blog*/

        $option = Option::where('key', 'tb_banner')->where('locale', session('locale'))->first();
        $tb_banner =json_decode($option->value);
      //  dd($js_banner);
         $i = 0;
         $k =$i+3609;
         for ($i=0; $i < 1; $i++) { 
           $k++;
           $tb_banner[$i]->image = $request->input($k);
         
        }
        $option_update = DB::table('options')->where('key', 'tb_banner')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $tb_banner)]);
        $flag = false;
        $flag = $option->update();
        Option::forget('tb_banner');
        /* Basic */

        $option = Option::where('key', 'site_multi_address')->where('locale', session('locale'))->first();
       //$option->value = json_encode(array_map('trim', explode(',', $request->input('site_keywords'))));
        $option_update = DB::table('options')->where('key', 'site_multi_address')
                            ->where('locale', session('locale'))
                            ->update(['value' =>json_encode(array_map('trim', explode(';', $request->input('site_multi_address'))))]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_multi_address');


        $option = Option::where('key', 'site_name')->where('locale', session('locale'))->first();
        $option_update = DB::table('options')->where('key', 'site_name')
                            ->where('locale', session('locale'))
                            ->update(['value' => $request->input('site_name')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_name');

        $option = Option::where('key', 'site_url')->first();
        $option_update = DB::table('options')->where('key', 'site_url')
                            ->update(['value' => $request->input('site_url')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_url');

        $option = Option::where('key', 'site_icon')->first();
        $option_update = DB::table('options')->where('key', 'site_icon')
                            ->update(['value' => $request->input('site_icon')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_icon');

        $option = Option::where('key', 'site_logos')->first();
        $option_update = DB::table('options')->where('key', 'site_logos')
                            ->update(['value' => $request->input('site_logos')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_logos');

        $option = Option::where('key', 'site_copyright')->first();
        $option_update = DB::table('options')->where('key', 'site_copyright')
                            ->update(['value' => $request->input('site_copyright')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_copyright');

        $option = Option::where('key', 'site_address')->where('locale', session('locale'))->first();
        $option_update = DB::table('options')->where('key', 'site_address')
                            ->where('locale', session('locale'))
                            ->update(['value' => $request->input('site_address')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_address');

        $option = Option::where('key', 'site_hotline')->first();
        $option_update = DB::table('options')->where('key', 'site_hotline')
                            ->update(['value' => $request->input('site_hotline')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_hotline');

        $option = Option::where('key', 'site_telephone')->first();
        $option_update = DB::table('options')->where('key', 'site_telephone')
                            ->update(['value' => $request->input('site_telephone')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_telephone');

        $option = Option::where('key', 'site_email')->first();
        $option_update = DB::table('options')->where('key', 'site_email')
                            ->update(['value' => $request->input('site_email')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_email');

        /* SEO */

        $option = Option::where('key', 'site_review')->where('locale', session('locale'))->first();
        $site_review =json_decode($option->value);
         $i = 0;
         $j =$i+694;
         $k =$i+699;
         $m =$i+704;
       //  dd($request->input(695));
         for ($i=0; $i < count($site_review); $i++) { 
           $j++;
           $k++;
           $m++;
           $site_review[$i]->title = $request->input($j);
           $site_review[$i]->content = $request->input($k);
           $site_review[$i]->image = $request->input($m);
        }
        $option_update = DB::table('options')->where('key', 'site_review')
                            ->where('locale', session('locale'))
                            ->update(['value' =>  json_encode( $site_review)]);
        $flag = false;
        $flag = $option->update();
        // $option->value = json_encode( $site_slide);
        // $option->save();
        Option::forget('site_review');


        $option = Option::where('key', 'site_title')->where('locale', session('locale'))->first();
        $option_update = DB::table('options')->where('key', 'site_title')
                            ->where('locale', session('locale'))
                            ->update(['value' => $request->input('site_title')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_title');



        $option = Option::where('key', 'site_description')->where('locale', session('locale'))->first();
        $option_update = DB::table('options')->where('key', 'site_description')
                            ->where('locale', session('locale'))
                            ->update(['value' => $request->input('site_description')]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_description');

        $option = Option::where('key', 'site_keywords')->where('locale', session('locale'))->first();
       //$option->value = json_encode(array_map('trim', explode(',', $request->input('site_keywords'))));
        $option_update = DB::table('options')->where('key', 'site_keywords')
                            ->where('locale', session('locale'))
                            ->update(['value' =>json_encode(array_map('trim', explode(',', $request->input('site_keywords'))))]);
        $flag = false;
        $flag = $option->update();
        Option::forget('site_keywords');

        $option = Option::where('key', 'site_image')->first();
        $option->value = $request->input('site_image');
        Option::forget('site_image');

        $option = Option::where('key', 'gg_analytics_tracking_id')->first();
        $option->value = $request->input('gg_analytics_tracking_id');
        Option::forget('gg_analytics_tracking_id');

        /* Social Networks */
        $option = Option::where('key', 'fb_app_id')->first();
        $option->value = $request->input('fb_app_id');
        Option::forget('fb_app_id');

          $option = Option::where('key', 'fb_page_link')->first();
          $option->value = $request->input('fb_page_link');
          Option::forget('fb_page_link');
          $flag = false;
          $flag = $option->update();
        
        if ($flag) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
