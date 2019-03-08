<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
class GuidereviewController extends ApiController
{
    //
    public function loadmore()
    {
    	 $tourguides = DB::table('tour_guides')->where('locale', session('locale'))->get();
    	// dd(session('locale'));
    	 $newArr = array('results' => $tourguides );
    	 //dd($newArr);
    	 return $newArr;

    }
}
