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
        $content_id = $current_url[strlen($current_url) - 1];
        $newQuery = DB::table('h5p_contents')->where('id',$content_id)->first();
        if( is_null($newQuery)){
           return redirect()->route('login');
        }
        return  User::where('id',$newQuery->user_id)->first();
    }

}
