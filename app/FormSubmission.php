<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    //
    public static function orphanList($locale = '', $hasRoot = true, $type ='faqs')
    {
        $retList = collect();
        if ($hasRoot) {
            $root = new FormSubmission();
            $root->id = 0;
            $root->question = '----------';
            $retList->put($root->id, $root);
        }

       

        $list = FormSubmission::where([
            ['type', $type],
            ['locale_source_id', 0],
            ['locale', '!=', $locale == '' ? session('locale') : $locale],
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('form_submissions');
        })->get();

        for ($i=0; $i < count($list) ; $i++) { 
        	# code...
        	$list[$i] =json_decode($list[$i]->metadata);
        }

        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }
    public static function orphanListEdit($locale = '', $hasRoot = true, $type ='faqs' , $id = 0)
    {
        $retList = collect();
        $news = FormSubmission::findOrFail($id);
        $samenews =DB::table('form_submissions')->where('locale_source_id',$news->id)->first();
       // $samenews =json_decode($samenews->metadata);
        $samenews2 = DB::table('form_submissions')->where('id',$news->locale_source_id)->first();
        //$samenews2 =json_decode($samenews2->metadata);
       // dd($samenews);
        if ($id != 0 && $samenews != null) {
            
            $root = new FormSubmission();
            $root->id = $samenews->id;
            $root->question = $samenews->name;
            $retList->put($root->id, $root);
        }  
        if ($id != 0 && $samenews2 != null) {
            $root = new FormSubmission();
            $root->id = $samenews2->id;
            $root->question = $samenews2->name;
            $retList->put($root->id, $root);
        }  
        if ($hasRoot) {
            $root = new FormSubmission();
            $root->id = 0;
            $root->question = '----------';
            $retList->put($root->id, $root);
        } 

        $list = FormSubmission::where([
            ['type', 'faqs'],
            ['locale_source_id', 0],
            ['id','!=',$id],
            ['locale', '!=', $locale == '' ? session('locale') : $locale]
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('form_submissions');
        })->get();
        for ($i=0; $i < count($list) ; $i++) { 
        	# code...
        	$list[$i] =json_decode($list[$i]->metadata);
        }
        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }

    public static function pagedList($locale, $type, $search, $offset, $limit)
    {
        $list = FormSubmission::where('type', $type)
            ->where('locale', $locale)
            ->where('metadata', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public static function count($locale, $type, $search)
    {
        $count = FormSubmission::where('type', $type)
            ->where('locale', $locale)
            ->where('metadata', 'like', '%' . $search . '%')
            ->count();
        return $count;
    }

}
