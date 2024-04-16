<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Models\Karyawan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
class KaryawanController extends Controller
{
     public function index()
    {
        //get all posts tes
        $posts=Karyawan::all(); 
		//$posts= DB::select('select * from karyawan ');  //SQL
		//$posts = DB::table('karyawan')->where('id', [1])->first(); // querybuilder
        
        return new PostResource(true, 'List Data Posts', $posts);
		
	}
		
		public function store(Request $request)
	{
		
		$hasil=false;
		$pesan="Gagal";
		
		try {
		//$user = Karyawan::create($request->all());  // ORM
		$user=DB::table('karyawan')->insert($request->all());  // querybuilder
		$hasil=true;
		$pesan="Berhasil";		
		 } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
               $pesan="Duplikasi data";	
            }
        }
		

		//return response()->json($user, 201);
		return new PostResource($hasil, $pesan,null);
	}
	
	 public function show(string $id)
    {
		$hasil=false;
		$pesan="Data tidak ditemukan";
        $posts = DB::table('karyawan')->select('*')->where('nik', [$id])->first(); // querybuilder
		//$posts = Karyawan::find($id);
		if($posts!=null){
			$hasil=true;
			$pesan="Data ditemukan";
		}
		
		return new PostResource($hasil, $pesan, $posts);
    }
	
	public function update(Request $request, string $id)
    {
		$hasil=true;
		$pesan="Berhasil";
        $data = Karyawan::find($id);
		$data->nama = $request->nama;
		
    
			$data->save();
			return new PostResource($hasil, $pesan, null);
    }
	
	public function destroy(string $id)
    {
        $hasil=true;
		$pesan="Berhasil";
        $data = Karyawan::find($id);
		$data->delete();
		return new PostResource($hasil, $pesan, null);
    }
	
	
	
	
	
}
