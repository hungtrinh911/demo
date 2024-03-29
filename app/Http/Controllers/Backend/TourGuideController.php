<?php

namespace App\Http\Controllers\Backend;
//use App\UserRole;
use Input; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use App\TourGuide;
use App\FieldGuide;
use App\RoleGuide;
use App\CertificateGuide;
use App\City;
use App\Language;
use App\FormSubmission;
use App\TourGuideLang;
use App\TourGuideRole;
use App\TourGuideCertificate;
use App\TourGuideField;
use Illuminate\Http\Request;
use Redirect;
use App\Permission;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;
use App\RolesPermission;
use App\User;
use App\UserRole;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;
use Session;
//use App\Http\Controllers\Controller;

class TourGuideController extends ThingController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$tourguides = DB::table('tour_guides')->where('locale', session('locale'))->get();
        return view("backend.tourguide.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    Tạo mới tourguide
    **/
    public function create()
    {
        $list = DB::table('font_end_things')->where('locale','')->orWhere('locale', session('locale'))->get();
        $multilang = new \stdClass();
        foreach ($list as $item) {
           $multilang->{$item->key_t} = $item->value;
        }
         $cities = DB::table('cities')->orderBy('name')->get(['name']);
         return view("backend.tourguide.add",compact('cities','multilang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $user = [
            'email'  =>$request->input('email'),
            'name'    => $request->input('username'),
        ];
        Mail::send('email.welcome', $user, function($message) use ($user){
            $message->to($user['email'], 'Chào mừng đến với guidereview.asia')
                    ->subject('Tài khoản được tạo thành công!');
        });
      //  dd($request->input('email'));

        try {
            DB::beginTransaction();

            // 01. Them bang user
            $user = new User();
            $user->username = $request->input('email');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make('123456');//md5('123456');
            $user->channel = 'backend';
            $flg = $user->save();
            if (!$flg) {
                DB::rollBack();
                return back()->with('error', trans('backend/common.error'))->withInput();
            }
            $permission = ['7','8','13','14'];
            foreach ($permission as $per) {

                        if ($per != "") {
                            $user->permissions()->attach($per);
                        }

            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
        }

        $image_cv = $request->file('logo1');
        $image_cd = $request->file('logo2');
        $image_full = $request->file('logo3');
        if ($image_cv != null) {
            # code...
        $input['logo1'] = time().'.'.$image_cv->getClientOriginalExtension();
        $destinationPath = public_path('/images/cv');
        $image_cv->move($destinationPath, $input['logo1']);
        }
        if($image_cd != null) {
            #code...
        $input['logo2'] = time().'.'.$image_cd->getClientOriginalExtension();
        $destinationPath1 = public_path('/images/cd');
        $image_cd->move($destinationPath1, $input['logo2']);
        }
        if($image_full != null) {
            #code...
        $input['logo3'] = time().'.'.$image_full->getClientOriginalExtension();
        $destinationPath2 = public_path('/images/full');
        $image_full->move($destinationPath2, $input['logo3']);
        }
     //   dd($image_cv);
       
        
        $tourguide = new TourGuide();

        $tourguide->name = $request->input('name');
        $tourguide->dob = $request->input('dob');
        $tourguide->sex = $request->input('sex');
        if ($request->input('status') == 1) {
            # code...
             $tourguide->status = "Hoạt động";
        }
        else
        $tourguide->status = "Tạm dừng";
        $tourguide->hot_tourguide = $request->input('hot_tourguide');

        if($image_cv != null){
         $tourguide->img_cv = time().'.'.$image_cv->getClientOriginalExtension();
        }
        else {
            $tourguide->img_cv =  null ;
        }
        if($image_cd != null){
        $tourguide->img_cd = time().'.'.$image_cd->getClientOriginalExtension();
        } 
        else{  $tourguide->img_cd = null ;
        }
        if( $image_full != null){
        $tourguide->img_full = time().'.'.$image_full->getClientOriginalExtension();
        } 
        else { $tourguide->img_full =null;
        }
        $tourguide->people_id = $request->input('people_id');
        $tourguide->passpost = $request->input('passpost');
        $tourguide->phone = $request->input('phone');
        $tourguide->email = $request->input('email');
        $tourguide->city = $request->input('city');
        $tourguide->address = $request->input('address');
        $tourguide->class = $request->input('class');
        $tourguide->LicensedType = $request->input('LicensedType');
        $tourguide->join_date = $request->input('join_date');
        $tourguide->card_id = $request->input('card_id');
        $tourguide->date_start = $request->input('date_start');
        $tourguide->date_end = $request->input('date_end');
        $tourguide->introduce = $request->input('info');
        $tourguide->locale = session('locale');
        $tourguide->locale_source_id = $request->input('locale_source_id');
        $tourguide->metadata = '[0,0,0,0,0,0]';
        //$tourguide->save();
        if ($tourguide->save()) {
            if ($tourguide->locale_source_id !=0) {
                $locale_source_id = $tourguide->locale_source_id;
                $samenews= TourGuide::find($locale_source_id);
                $samenews->locale_source_id = $tourguide->id;
                $samenews->update();
            }
            return redirect()->route('tourguideindex')->with('success', trans('backend/common.success'))->withInput();
            //return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
       // return Redirect::route('tourguide');
       // return redirect()->route('tourguideindex');
    }
    /**
    Edit tourguide
    **/
    public function edit($id)
    {

        $cities = DB::table('cities')->orderBy('name')->get(['name']);
        $tourguide = TourGuide::findOrFail($id);
        $list = DB::table('font_end_things')->where('locale','')->orWhere('locale', session('locale'))->get();
      $multilang = new \stdClass();
      foreach ($list as $item) {
       $multilang->{$item->key_t} = $item->value;
      }
        return view('backend.tourguide.edit',compact('tourguide','cities','multilang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_cv = $request->file('logo1');
        $image_cd = $request->file('logo2');
        $image_full = $request->file('logo3');
        if ($image_cv != null) {
            # code...
        $input['logo1'] = time().'.'.$image_cv->getClientOriginalExtension();
        $destinationPath = public_path('/images/cv');
        $image_cv->move($destinationPath, $input['logo1']);
        }
        if($image_cd != null) {
            #code...
        $input['logo2'] = time().'.'.$image_cd->getClientOriginalExtension();
        $destinationPath1 = public_path('/images/cd');
        $image_cd->move($destinationPath1, $input['logo2']);
        }
        if($image_full != null) {
            #code...
        $input['logo3'] = time().'.'.$image_full->getClientOriginalExtension();
        $destinationPath2 = public_path('/images/full');
        $image_full->move($destinationPath2, $input['logo3']);
        }

        $tourguide = TourGuide::findOrFail($id);
        $tourguide->name = $request->input('name');
        $tourguide->dob = $request->input('dob');
        $tourguide->sex = $request->input('sex');
        if ($request->input('status') == 1) {
            # code...
             $tourguide->status = "Hoạt động";
        }
        else
            $tourguide->status = "Tạm dừng";
        $tourguide->hot_tourguide = $request->input('hot_tourguide');
        if($image_cv != null){
        $tourguide->img_cv = time().'.'.$image_cv->getClientOriginalExtension();
        }
        else {
            $tourguide->img_cv =  $tourguide->img_cv ;}
        if($image_cd != null){
        $tourguide->img_cd = time().'.'.$image_cd->getClientOriginalExtension();
        } 
        else{  $tourguide->img_cd = $tourguide->img_cd ;}
        if( $image_full != null){
        $tourguide->img_full = time().'.'.$image_full->getClientOriginalExtension();
        } 
        else { $tourguide->img_full =   $tourguide->img_full ;}
        $tourguide->people_id = $request->input('people_id');
        $tourguide->passpost = $request->input('passpost');
        $tourguide->phone = $request->input('phone');
        $tourguide->email = $request->input('email');
        $tourguide->city = $request->input('city');
        $tourguide->address = $request->input('address');
        $tourguide->class = $request->input('class');
        $tourguide->LicensedType = $request->input('LicensedType');
        $tourguide->join_date = $request->input('join_date');
        $tourguide->card_id = $request->input('card_id');
        $tourguide->date_start = $request->input('date_start');
        $tourguide->date_end = $request->input('date_end');
        $tourguide->introduce = $request->input('info');
        $tourguide->locale_source_id = $request->input('locale_source_id');
        // $tourguide->metadata ='[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]';
         if ($tourguide->update()){
             if ($tourguide->locale_source_id !=0) {
                    $locale_source_id = $tourguide->locale_source_id;
                    $samenews= TourGuide::find($locale_source_id);
                    $samenews->locale_source_id = $tourguide->id;
                    $samenews->update();
             }
          return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_skill($id ,Request $request)
    {      
    // kiểm tra permisson 

        if (Auth::check()) {
             $user = Auth::user();
        }
        $userpermission =DB::table('users_permissions')->where('user_id' ,'=',$user->id)->pluck('permission_id');
        $permission = json_decode($userpermission);
      
        $tourguides = TourGuide::findOrFail($id);
       // dd($tourguides);
        $comments = DB::table('form_submissions')->where('type','comment')->get();
        for ($i=0; $i < count($comments); $i++) { 
            $comments[$i] = json_decode($comments[$i]->metadata);
        }
        $comments = $comments->where('tourguide_id',$tourguides->id);
 
         // show tourguide_languages
        $tourguide_lang=  DB::table('tour_guide_langs')->where('id_tourguide',$id)->pluck('id_language');
        $tourguide_lang = $tourguide_lang->implode("," );
        $tourguide_lang1 = DB::table('languages')->where('locale',session('locale'))->take(10)->get();
        $tourguide_lang2 = DB::table('languages')->where('locale',session('locale'))->orderBy('id', 'desc')->take(9)->get();
        
       
        //show tourguide_roles (vai trò)
        $tourguide_role=  DB::table('tour_guide_roles')->where('id_tourguide',$id)->where('locale',session('locale'))->pluck('id_roles');
        $tourguide_role = $tourguide_role->implode("," );
        $tourguide_role1 = DB::table('role_guides')->where('locale',session('locale'))->take(3)->get();
        $tourguide_role2 = DB::table('role_guides')->where('locale',session('locale'))->orderBy('id', 'desc')->take(2)->get();

        //show certificate( chứng chỉ )
        $tourguide_certificate =  DB::table('tour_guide_certificate')->where('id_tourguide',$id)->where('locale',session('locale'))->pluck('id_certificates');
        $tourguide_certificate = $tourguide_certificate->implode("," );

        $tourguide_certificate1 = DB::table('certificate_guides')->where('locale',session('locale'))->take(3)->get();
        //dd($tourguide_certificate1);
        $tourguide_certificate2 = DB::table('certificate_guides')->where('locale',session('locale'))->orderBy('id', 'desc')->take(1)->get();

        //show field ( sở trường )
        $tourguide_field =  DB::table('tour_guide_fields')->where('id_tourguide',$id)->pluck('id_fields');
        $tourguide_field = $tourguide_field->implode("," );


        $tourguide_fieldname = DB::table('field_guides')->where('locale',session('locale'))->distinct()->pluck('name');
        $tourguide_fieldvalue = DB::table('field_guides')->where('locale',session('locale'))->distinct()->pluck('value');

    
        for ($i=0; $i < count($tourguide_fieldname) ; $i++) { 
            # code...
             $tourguide_all_field[$i]=DB::table('field_guides')->where('name',$tourguide_fieldname[$i])->where('locale',session('locale'))->get();

        }
   //   dd($tourguide_all_field);

        $tourguide_field1 = DB::table('field_guides')->where('name','=','Đưa đón khách')->get();
        $tourguide_field2 = DB::table('field_guides')->where('name','=','Tour tâm linh')->get();
        $tourguide_field3 = DB::table('field_guides')->where('name','=','Tour teambuilding ')->get();
        $tourguide_field4 = DB::table('field_guides')->where('name','=','Tour mạo hiểm')->get();
        $tourguide_field5 = DB::table('field_guides')->where('name','=','Tour học sinh')->get();
        $tourguide_field6 = DB::table('field_guides')->where('name','=','Tour truyền thống')->get();
        $tourguide_field7 = DB::table('field_guides')->where('name','=','Tour nghỉ dưỡng')->get();
        $tourguide_field8 = DB::table('field_guides')->where('name','=','Tour xe đạp')->get();
        $tourguide_field9 = DB::table('field_guides')->where('name','=','Tour xe máy')->get();
        $tourguide_field10 = DB::table('field_guides')->where('name','=','Foody tour')->where('locale',session('locale'))->get();
       if ($user->email == $tourguides->email || in_array(5 ,$permission ,true)) {
           
           return view('backend.tourguide_skill.add')
                        ->with(['tourguides'=>$tourguides,
                                'tourguide_lang'=>$tourguide_lang,
                                'tourguide_lang1'=>$tourguide_lang1,
                                'tourguide_lang2'=>$tourguide_lang2,
                                'tourguide_role'=>$tourguide_role,
                                'tourguide_role1'=>$tourguide_role1,
                                'tourguide_role2'=>$tourguide_role2,
                                'tourguide_certificate'=>$tourguide_certificate,
                                'tourguide_certificate1'=>$tourguide_certificate1,
                                'tourguide_certificate2'=>$tourguide_certificate2,
                                'tourguide_field'=>$tourguide_field,
                                'tourguide_fieldname'=>$tourguide_fieldname,
                                'tourguide_fieldvalue'=>$tourguide_fieldvalue,
                                'tourguide_field1'=>$tourguide_field1,
                                'tourguide_field2'=>$tourguide_field2,
                                'tourguide_field3'=>$tourguide_field3,
                                'tourguide_field4'=>$tourguide_field4,
                                'tourguide_field5'=>$tourguide_field5,
                                'tourguide_field6'=>$tourguide_field6,
                                'tourguide_field7'=>$tourguide_field7,
                                'tourguide_field8'=>$tourguide_field8,
                                'tourguide_field9'=>$tourguide_field9,
                                'tourguide_field10'=>$tourguide_field10,
                                'comments'=>$comments,
                                'tourguide_all_field' =>$tourguide_all_field,
                                 ]);
       }
       else
       {
          return view('errors.403');
       }
            
     }
     public function store_skill(Request $request ,$id)
     {
        $tourguide = TourGuide::findOrFail($id);    
        $arr_languages = $request->input('languages');
        if($arr_languages != null) {
            for ( $i=0; $i <count($arr_languages) ; $i++) { 
                   $arr_flag[$i] =json_encode(DB::table('languages')->where('id',$arr_languages[$i])->pluck('flag'));
                   $arr_flag[$i] = ltrim( $arr_flag[$i], '[');
                   $arr_flag[$i] = rtrim( $arr_flag[$i], ']');
                   $arr_flag[$i] = ltrim( $arr_flag[$i], '"');
                   $arr_flag[$i] = rtrim( $arr_flag[$i], '"');
                ;
            }
            $arr_flag = json_encode($arr_flag);
        }
        else {
            $arr_flag = null;
        }
        
        $arr_roles = $request->input('roles');
        $arr_fields = $request->input('field');

        $arr_certificates =$request->input('certificates');
       // dd($arr_fields);
        $dif_lang = $request->input('langu');
        $languages = new TourGuide();
        $languages = $dif_lang ;
     
//dd(session()->all());
        $certificate = new TourGuide();
        $certificate =$request->input('certi');
//dd($certificate);
        $locale_1 = new TourGuide();

        $locale_1 = $request->input('locale_1');
       
        $start = $request->input('start');
        $end = $request->input('end');

        $locale_2 = new TourGuide();
        $locale_2 = $request->input('locale_2');

        DB::beginTransaction();
        DB::table('tour_guides')
            ->where('id', $id)
            ->update([ 'certificate'=>$certificate ,'languages'=>$dif_lang, 'locale_1'=>$locale_1 ,'locale_2'=>$locale_2 ,'start'=>$start,'end'=>$end]);

        DB::table('tour_guide_langs')->where('id_tourguide',$tourguide->id)->where('locale',session('locale'))->delete();
        DB::table('tour_guide_roles')->where('id_tourguide',$tourguide->id)->where('locale',session('locale'))->delete();
        DB::table('tour_guide_fields')->where('id_tourguide',$tourguide->id)->where('locale',session('locale'))->delete();
        DB::table('tour_guide_certificate')->where('id_tourguide',$tourguide->id)->where('locale',session('locale'))->delete();
      
        if ($arr_languages != null) {
            # code...
            foreach ($arr_languages as $language) {
            $tourguidelanguages = new TourGuideLang();
            $tourguidelanguages->id_tourguide =$tourguide->id;
            $tourguidelanguages->id_language =$language;
            $tourguidelanguages->locale = session('locale') ;
            $tourguidelanguages->save();
            };
        }


        if ($arr_roles != null) {
            foreach ($arr_roles as $roles) {
            $tourguideroles = new TourGuideRole();
            $tourguideroles->id_tourguide =$tourguide->id;
            $tourguideroles->id_roles =$roles ;
            $tourguideroles->locale = session('locale') ;
            $tourguideroles->save();
             };
        }
        if ($arr_certificates !=null) {
            foreach ($arr_certificates as $certificates) {
            $tourguidecertificate = new TourGuideCertificate();
            $tourguidecertificate->id_tourguide =$tourguide->id;
            $tourguidecertificate->id_certificates =$certificates ;
            $tourguidecertificate->locale = session('locale') ;
            $tourguidecertificate->save();
            };
        }
        //$lc =
        if ($arr_fields != null) {
          
                foreach ($arr_fields as $field) {
                $tourguidefield = new TourGuideField();
                $tourguidefield->id_tourguide =$tourguide->id;
                $tourguidefield->id_fields =$field ;
                $tourguidefield->locale  = session('locale');
                $tourguidefield->save();
                };
        }
        //dd (session('locale'));


       $flg = DB::commit();
        
        if (!$flg){
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }


    public function showprofile($id)
    {
        // kiểm tra permission 
        if (Auth::check()) {
             $user = Auth::user();
        }
        $userpermission =DB::table('users_permissions')->where('user_id' ,'=',$user->id)->pluck('permission_id');
        $permission = json_decode($userpermission);

        // tim tour guide
        $tourguides =TourGuide::findOrFail($id);
        $comments = DB::table('form_submissions')->where('type','comment')->get();
        for ($i=0; $i < count($comments); $i++) { 
            $comments[$i] = json_decode($comments[$i]->metadata);
        }
        $comments = $comments->where('tourguide_id',$tourguides->id);

        if ($user->email == $tourguides->email || in_array(5 ,$permission ,true)) {
            return view('backend.tourguide.show',compact('tourguides','comments'));
        }
        else 
            return view('errors.403');
    }

    public function storeAccount(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
        ]);
         $user = [
            'email'  =>$request->input('email'),
            'name'    => $request->input('username'),
        ];
        Mail::send('email.welcome', $user, function($message) use ($user){
            $message->to($user['email'], 'Chào mừng đến với guidereview.asia')
                    ->subject('Tài khoản được tạo thành công!');
        });


        try {
            DB::beginTransaction();

            // 01. Them bang user
            $user = new User();
            $user->username = $request->input('username');
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make('123456');//md5('123456');
            $user->channel = 'backend';
            $flg = $user->save();
            if (!$flg) {
                DB::rollBack();
                return back()->with('error', trans('backend/common.error'))->withInput();
            }

            // 02. Them permission
       //      $role = '5';
       //      $user_role = new UserRole();
       //      $user_role->role_id = $role;
       //      $user_role->user_id = $user->id;
       //      $flg = $user_role->save();
       // //     dd($user_role);
       //      $list_permission = RolesPermission::where('role_id', $user_role->role_id)->pluck('permission_id');
       //      dd($list_permission);
       //              foreach ($list_permission as $permission) {
       //                  if ($permission != "") {
       //                      $user->permissions()->attach($permission);
       //                  }
       //      }
             
            $permission = ['7','13','14'];
            //$permission1 = json_decode($permission);
           //dd($permission);
            foreach ($permission as $per) {
              //  dd($per);
                        if ($per != "") {
                            $user->permissions()->attach($per);
                        }

            }
            DB::commit();
            return back()->with([
                'success' => trans('backend/common.success'),
            ])->withInput();
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', trans('backend/common.error'))->withInput();
        }


    }

    /**
     * Hiển thị trang thêm mới
     */
    public function createAccount()
    {
     
        return view('backend.tourguide.account');
    }

/***User Comment***/    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TourGuide::destroy($id);
        //$tourguide = TourGuide::findOrFail($id); 
        //DB::table('tour_guides')->where('id',$tourguide->id)->delete();
        return back();
    }
}
