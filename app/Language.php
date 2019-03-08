<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\TourGuide;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function tourguide()
    {
        return $this->belongsToMany(TourGuide::class, 'tour_guide_langs');
    }
    public static function getFlag($id){
     $languages = DB::table('languages')->orderBy('language')->where('locale',session('locale'))->get();
     $flag = DB::table('tour_guide_langs')->where('id_tourguide',$id)->where('locale',session('locale'))->pluck('id_language');
    
             for ($i=0; $i < count($flag) ; $i++) { 
                    # code...
                for ($j=0; $j <count($languages); $j++) { 
                      # code...
                  if ($flag[$i] == $languages[$j]->id) {
                        # code...
                    $flag[$i] = $languages[$j]->flag;
                }
            }
        }
    return $flag;
    }

}
