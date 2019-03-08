<?php

namespace App\Http\Controllers\Backend;
use App\TourGuide;
use App\FormSubmission;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\News;
use App\User;
use Auth;
use App\Helper;
class FaqsController extends Controller
{
    // //
    //  private function getMenuItems($parentId = 0)
    // {
       
    // }
    // public function menu()
    // {
    //     // Nếu có trong session thì trả ra
    //     if (session()->has('menu')) {
    //         //dd(session('menu'));
    //         return session('menu');
    //     }

    //     $menuItems = $this->showFaqs();
    //     dd($menuItems);
    //     // Chưa có thì lưu vào session
    //     session(['menu' => $menuItems]);
    //     return session('menu');
    // }
    public function showFaqs($parentId =0)
    {
     //dd(session()->all()); 
    //     $items = DB::table('things')
    //         ->selectRaw('things.id,
    //             things.title,
    //             things.slug as menu_item_slug,
    //             things.featured_img,
    //             things.metadata,
    //             things.parent_id,
    //             permissions.slug as permission_slug')
    //         ->join('permissions', 'permissions.thing_id', '=', 'things.id')
    //         ->join('users_permissions', 'users_permissions.permission_id', '=', 'permissions.id')
    //         ->where([
    //             ['users_permissions.user_id',1],
    //             ['things.parent_id', $parentId],
    //             ['things.locale', env('LOCALE_DEFAULT')],
    //         ])
    //         ->orderBy('order_index')
    //         ->get();
    //         dd($items);
 
    //     foreach ($items as $item) {
    //         $subItems = DB::table('things')
    //         ->selectRaw('things.id,
    //             things.title,
    //             things.slug as menu_item_slug,
    //             things.featured_img,
    //             things.metadata,
    //             things.parent_id,
    //             permissions.slug as permission_slug')
    //         ->join('permissions', 'permissions.thing_id', '=', 'things.id')
    //         ->join('users_permissions', 'users_permissions.permission_id', '=', 'permissions.id')
    //         ->where([
    //             ['users_permissions.user_id',1],
    //             ['things.parent_id', $item->id],
    //             ['things.locale', env('LOCALE_DEFAULT')],
    //         ])
    //         ->orderBy('order_index')
    //         ->get();
    //         foreach ($subItems as $sub ) {
    //             # code...
    //              $tempSub = (array)json_decode($sub->metadata);
    //              $sub->menu_item_slug = Helper::currentRoutePrefix() . $sub->menu_item_slug;
    //              if (array_key_exists('showOnMenu', $tempSub)) {
    //                 $sub->showOnMenu = $tempSub['showOnMenu'];
    //              } else {
    //                     $sub->showOnMenu = false;
    //             }
    //         }
           

    //         $temp = (array)json_decode($item->metadata);

    //         $item->menu_item_slug = Helper::currentRoutePrefix() . $item->menu_item_slug;
    //         if (array_key_exists('hasChild', $temp)) {
    //             $item->hasChild = $temp['hasChild'];
    //         } else {
    //             $item->hasChild = false;
    //         }

    //         if (array_key_exists('showOnMenu', $temp)) {
    //             $item->showOnMenu = $temp['showOnMenu'];
    //         } else {
    //             $item->showOnMenu = false;
    //         }

    //         if ($item->hasChild == true) {
    //             $item->children = $subItems;
    //         }
    //     }
    //     $a = session(['menu' => $items]);
    //  dd($items);
    // //     return $items;
  



        $faqs = DB::table('form_submissions')->where('type','faqs')->where('locale', session('locale'))->get();
       
      	//dd($faqs);
        $faqs_id = DB::table('form_submissions')->where('type','faqs')->where('locale', session('locale'))->get();
        for ($i=0; $i < count($faqs); $i++) {
            $faqs[$i] = json_decode($faqs[$i]->metadata);
            $faqs[$i] = ["question" => $faqs[$i]->question,"status"=>$faqs[$i]->status ,"answer"=>$faqs[$i]->answer ,"id"=>$faqs_id[$i]->id]; 
        }
        $faqs =json_decode($faqs);
      
        //dd(FormSubmission::orphanList());
        return view('backend.faqs.index',compact('faqs'));   
    }

    public function showAddForm(){

         return view('backend.faqs.add');
    }


    public function store(Request $request)
    {
        $faqs = new FormSubmission();
        $question = $request->input('question');
        
        $answer = $request->input('answer');
        $status = $request->input('status');
        $metadata = ["question"=>$question ,'answer'=>$answer ,'status'=>$status];
        $faqs->metadata = json_encode($metadata);
        $faqs->name=$question;
        $faqs->status = $status;
        $faqs->locale=session('locale');
        $faqs->locale_source_id = $request->input('locale_source_id');
        $faqs->email=$question;
        $faqs->type='faqs';
        $faqs->save();
        //dd($faqs->id);
        $metadata = ["question"=>$question ,'answer'=>$answer ,'status'=>$status,'id'=>$faqs->id,'locale_source_id' =>$faqs->locale_source_id];
        $faqs->metadata = json_encode($metadata);
        $faqs->update();
        return back();
    }


    public function showEditFaqsForm($id){

         $faqs =FormSubmission::findOrFail($id);
         $faq =FormSubmission::findOrFail($id);
         $faqs_locale = DB::table('form_submissions')->where('type','faqs')->where('locale', session('locale'))->first();
         $faqs = json_decode($faqs->metadata);
         return view('backend.faqs.edit',compact('faqs','faqs_locale','faq'));
    }

    public function updateFaqs(Request $request , $id)
    {
        $faqs =FormSubmission::findOrFail($id);
        
        $question = $request->input('question');
        $answer = $request->input('answer');
        $status = $request->input('status');
        $faqs->name=$question;
        $faqs->email=$question;
        $faqs->type='faqs';
      //  $faqs->locale=session('locale');
        $faqs->status = $status;
        $faqs->locale_source_id = $request->input('locale_source_id');
         $metadata = ["question"=>$question ,'answer'=>$answer ,'status'=>$status,'id'=>$faqs->id,'locale_source_id' =>$faqs->locale_source_id];
        $faqs->metadata = json_encode($metadata);
        //dd($faqs);
        $faqs->update();
        return back();
    }
    public function destroy($id)
    {
       
        $faqs =FormSubmission::findOrFail($id);
        if ($faqs->delete()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
