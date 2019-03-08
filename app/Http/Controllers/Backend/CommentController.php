<?php

namespace App\Http\Controllers\Backend;
use App\TourGuide;
use App\FormSubmission;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;
use App\RolesPermission;
use App\User;
use App\Helper;
use App\UserRole;
use App\Base\Thing;
use Illuminate\Support\Facades\Hash;
use Validator;
class CommentController extends Controller
{
    //
    public function showComment($id)
    {

        if (Auth::check()) {
             $user = Auth::user();
        }
        $userpermission =DB::table('users_permissions')->where('user_id' ,'=',$user->id)->pluck('permission_id');
        $permission = json_decode($userpermission);

        $tourguides =TourGuide::findOrFail($id);
        $comments = DB::table('form_submissions')->where('type','comment')->orderBy('id', 'desc')->get();
        for ($i=0; $i < count($comments); $i++) { 
            $comments[$i] = json_decode($comments[$i]->metadata);
        }
        $comments = $comments->where('tourguide_id',$tourguides->id);
          if ($user->email == $tourguides->email || in_array(12 ,$permission ,true)) {
             return view('backend.comment.index',compact('tourguides','comments'));  
        }
        else 
            return view('errors.403');
    }

    public function showEditCommentForm($id){

        if (Auth::check()) {
             $user = Auth::user();
        }
        $userpermission =DB::table('users_permissions')->where('user_id' ,'=',$user->id)->pluck('permission_id');
        $permission = json_decode($userpermission);
        $comment =FormSubmission::findOrFail($id);
        $comments =FormSubmission::findOrFail($id);
        $comments = json_decode($comments->metadata);
        $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
      //  dd($tourguides);
           if ($user->email == $tourguides->email || in_array(12 ,$permission ,true)) {
              return view('backend.comment.edit',compact('comments','tourguides','comment'));
        }
        else 
            return view('errors.403');
        
    }
    public function updateComment(Request $request , $id)
    {
        $comment =FormSubmission::findOrFail($id);
        $comments =FormSubmission::findOrFail($id);

        $comments = json_decode($comments->metadata);
        $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
        $content = $comments->comment;
        $status = $request->input('status');
          
        $tourguide_id = $tourguides->id;
        $metadata = ["comment" => $content ,"status"=>$status ,"tourguide_id"=>$tourguide_id,"name" =>$comments->name,"email"=>$comments->email,"phone"=>$comments->phone,"id"=>$comments->id];
        $comment->metadata =json_encode($metadata);
        $comment->update();
        $comments->status = $status;
        $comments->update();
        return back();
    }
/**All Comment**/
    public function showAllComment()
    {
        
//       // $a=  DB::table('things')->selectRaw('things.id,
//       //           things.title,
//       //           things.slug as menu_item_slug,
//       //           things.featured_img,
//       //           things.metadata,
//       //           things.parent_id,
//       //           permissions.slug as permission_slug')->join('permissions', 'permissions.thing_id', '=', 'things.id')
//       //       ->join('users_permissions', 'users_permissions.permission_id', '=', 'permissions.id')            ->where([
//       //           ['users_permissions.user_id', 1],
//       //           ['things.parent_id', 23],
//       //           ['things.locale', env('LOCALE_DEFAULT')],
//       //       ])->get();
//       //       foreach ($a as $b ) {
//       //           # code...
//       //            $tempSub = (array)json_decode($b->metadata);
//       //            //dd($tempSub);
//       //            $b->menu_item_slug = Helper::currentRoutePrefix() . $b->menu_item_slug;
//       //            if (array_key_exists('showOnMenu', $tempSub)) {
//       //               $b->showOnMenu = $tempSub['showOnMenu'];
//       //            } else {
//       //                   $b->showOnMenu = false;
//       //           }
//       //       }
                      

          
//       // dd($a);
//         //session()->forget('menu');
//       //dd(session()->all());
//       $items = DB::table('things')
//             ->selectRaw('things.id,
//                 things.title,
//                 things.slug as menu_item_slug,
//                 things.featured_img,
//                 things.metadata,
//                 things.parent_id,
//                 permissions.slug as permission_slug')
//             ->join('permissions', 'permissions.thing_id', '=', 'things.id')
//             ->join('users_permissions', 'users_permissions.permission_id', '=', 'permissions.id')
//             ->where([
//                 ['users_permissions.user_id', 1],
//                 ['things.parent_id', 0],
//                 ['things.locale', env('LOCALE_DEFAULT')],
//             ])
//             ->orderBy('order_index')
//             ->get();

//         foreach ($items as $item) {
//             $subItems = DB::table('things')
//             ->selectRaw('things.id,
//                 things.title,
//                 things.slug as menu_item_slug,
//                 things.featured_img,
//                 things.metadata,
//                 things.parent_id,
//                 permissions.slug as permission_slug')
//             ->join('permissions', 'permissions.thing_id', '=', 'things.id')
//             ->join('users_permissions', 'users_permissions.permission_id', '=', 'permissions.id')
//             ->where([
//                 ['users_permissions.user_id', 1],
//                 ['things.parent_id', $item->id],
//                 ['things.locale', env('LOCALE_DEFAULT')],
//             ])
//             ->orderBy('order_index')
//             ->get();
// //dd($subItems);
//             foreach ($subItems as $sub ) {
//                 # code...
//                  $tempSub = (array)json_decode($sub->metadata);
//                  //dd($tempSub);
//                  $sub->menu_item_slug = Helper::currentRoutePrefix() . $sub->menu_item_slug;
//                  if (array_key_exists('showOnMenu', $tempSub)) {
//                     $sub->showOnMenu = $tempSub['showOnMenu'];
//                  } else {
//                         $sub->showOnMenu = false;
//                 }
//             }

//             $temp = (array)json_decode($item->metadata);
//            // dd($temp);
//             $item->menu_item_slug = Helper::currentRoutePrefix() . $item->menu_item_slug;
//             if (array_key_exists('hasChild', $temp)) {
//                 $item->hasChild = $temp['hasChild'];
//             } else {
//                 $item->hasChild = false;
//             }

//             if (array_key_exists('showOnMenu', $temp)) {
//                 $item->showOnMenu = $temp['showOnMenu'];
//             } else {
//                 $item->showOnMenu = false;
//             }

//             if ($item->hasChild == true) {
//                 //$subItems = $this->showFaqs($item->id);
//                // $item->children = 1;
//                 $item->children = $subItems;
//             }
//         }
//        // dd($subItems);
//         //$a = session(['menu' => $items]);
//        dd($items);
//        // dd($items);





//         $d = DB::table('things')->where('parent_id',23)->get();
//         dd($d);
//          dd(session()->all());
        $comments = DB::table('form_submissions')->where('type','comment')->orderBy('id', 'desc')->get();
        for ($i=0; $i < count($comments); $i++) { 
            $comments[$i] = json_decode($comments[$i]->metadata);
        }
        //dd($comments);
        return view('backend.comment.Allindex',compact('comments'));   
    }

    public function showEditAllCommentForm($id){
         $comment =FormSubmission::findOrFail($id);
         $comments =FormSubmission::findOrFail($id);
         $comments = json_decode($comments->metadata);
       // dd($comments);
         $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
         //dd($tourguides);
         return view('backend.comment.Alledit',compact('comments','tourguides','comment'));
    }
    public function updateAllComment(Request $request , $id)
    {
        $comment =FormSubmission::findOrFail($id);
        $comments =FormSubmission::findOrFail($id);
        $comments = json_decode($comments->metadata);
        //dd($comments);
        $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
       // dd($tourguides);
        //$content = $request->input('comment');
        $status = $request->input('status');
        $tourguide_id = $tourguides->id;
        $content = $comments->comment;
        $metadata = ["comment" => $content ,"status"=>$status ,"tourguide_id"=>$tourguide_id,"name" =>$comments->name,"email"=>$comments->email,"phone"=>$comments->phone,"id"=>$comments->id];
        $comment->metadata =json_encode($metadata);
        $comment->update();
        $comments->status = $status;
        $comments->update();
        return back();
    }
    public function destroy($id)
    {
             FormSubmission::destroy($id);
             return back();
    }
}
