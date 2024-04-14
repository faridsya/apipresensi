<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Models\Presensi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\PostResource;
class PresensiController extends Controller
{
 /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $posts = Presensi::latest()->paginate(5); //Eloquent ORM
		$posts= DB::select('select * from presensi where id = ?', [1])[0];  //SQL
		//$posts = DB::table('presensis')->where('id', [1])->first(); // querybuilder
        
        return new PostResource(true, 'List Data Posts', $posts);
    }
}
