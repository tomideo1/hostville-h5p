<?php


namespace Djoudi\LaravelH5p\TomideH5pClasses;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthClass
{
      public function getAuthUser(){
        $current_url = URL::current();
        $url = explode("/",$current_url);
        $newQuery = DB::table('h5p_contents')->where('id',$url[5])->first();
        if( is_null($newQuery)){
          return redirect()->route('login');
        }
        return  User::where('id',$newQuery->user_id)->first();
      }

}
