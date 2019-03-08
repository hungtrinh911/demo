<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Comment extends Model
{
    //
  
    public static function pagedList($locale, $type, $search, $offset, $limit)
    {
        $list = Thing::where('type', $type)
            ->where('locale', $locale)
            ->where('title', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public static function count($locale, $type, $search)
    {
        $count = Thing::where('type', $type)
            ->where('locale', $locale)
            ->where('title', 'like', '%' . $search . '%')
            ->count();
        return $count;
    }

}
