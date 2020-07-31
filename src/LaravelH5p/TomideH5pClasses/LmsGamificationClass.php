<?php


namespace Djoudi\LaravelH5p\TomideH5pClasses;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class LmsGamificationClass
{

    public function  create($content_id){
      if (Schema::hasTable('gamifications'))
      {
        DB::table('gamifications')->insert([
          'id' =>  Str::uuid()->toString(),
          'tenant_id' => Auth::user()->id,
          'content_id' =>  $content_id,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
      }

    }

    public  function delete($content_id){
      if (Schema::hasTable('gamifications'))
      {
        DB::table('gamifications')
          ->where('content_id',$content_id)
          ->delete();
      }

    }

}
