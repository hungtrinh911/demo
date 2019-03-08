<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TourGuide extends Model
{
    //
    public function tourguide()
    {
        return $this->belongsToMany(TourGuide::class, 'tour_guide_langs');
    }

    public static function listpage($locale, $search, $offset, $limit)
    {
        $list = TourGuide::where('locale', $locale)
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('card_id', 'like', '%' . $search . '%')
            ->orWhere('city', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public static function countpage($locale, $search)
    {
        $count = TourGuide::where('locale', $locale)
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('card_id', 'like', '%' . $search . '%')
            ->orWhere('city', 'like', '%' . $search . '%')
            ->count();
        return $count;
    }

    public static function totalpoint($id)
    {
    	$star = json_decode(DB::table('tour_guides')->where('id',$id)->pluck('metadata'));
        $star = json_decode($star[0]);
        $total_star1 =0;
    	if ($star != null) {
    		for ($i=0; $i < count($star) ; $i++) { 
    		  $total_star1 = $star[$i]+ $total_star1;
            }    	
    	}
        $total_star1 = $total_star1/6;
        if($total_star1>4.95)
            $total_star1 =5;
        $total_star1= substr($total_star1, 0, 3);
       
    	return $total_star1;
    }

   public static function getPoint($key,$id){
    $star = json_decode(DB::table('tour_guides')->where('id',$id)->pluck('metadata'));
    $star = json_decode($star[0]);
    return $star[$key];
   }

    public static function allstar($id,$num)
    {
        $star = json_decode(DB::table('tour_guides')->where('id',$id)->pluck('metadata'));

        if ($star != null) {
            for ($i=0; $i < count($star) ; $i++) { 
            $total_star[$i] = json_decode($star[$i]);
            if(is_int($total_star[$i][$num]) == false){
                $star_show = $total_star[$i][$num]-0.5;
            }
            else
                $star_show = $total_star[$i][$num]+1;
        }
        
        }
         return $star_show;
    }
    public static function orphanList($locale = '' , $hasRoot = true)
    {
        $retList = collect();
        if ($hasRoot) {
            
            $root = new TourGuide();
            $root->id = 0;
            $root->title = '----------';
            $retList->put($root->id, $root);
        }
        $list = TourGuide::where([
            ['locale_source_id', 0],
            ['locale', '!=', $locale == '' ? session('locale') : $locale],
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('things');
        })->get();

        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }
    public static function test($id){
        if($id ==29)
        return '<p>hehehe</p>';
        else
            return '<p>huhuhu</p>';
    }
}
