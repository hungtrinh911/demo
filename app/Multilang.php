<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Multilang extends Model
{
    //    */
    protected $table = 'font_end_things';
    protected $hidden = array('pivot');

    // public static function get($key)
    // {
    //     $realKey = app()->getLocale() . '_' . $key;
    //     if (!Cache::has($realKey)) {
    //         $multilang =DB::table('font_end_things')->where('key', $key)
    //             ->where(function ($query) {
    //                 $query->where('locale', '=', '')
    //                     ->orWhere('locale', '=', app()->getLocale());
    //             })->first();
    //         if (starts_with($multilang->value, '[') or starts_with($multilang->value, '{')) {
    //             Cache::put($realKey, json_decode($multilang->value), 60);
    //         } else {
    //             Cache::put($realKey, $multilang->value, 60);
    //         }
    //     }
    //     return Cache::get($realKey);
    // }

    // public static function forget($key)
    // {
    //     $realKey = app()->getLocale() . '_' . $key;
    //     if (Cache::has($realKey)) {
    //         Cache::forget($realKey);
    //     }
    // }
}
