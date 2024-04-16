<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
	
	public function login(Request $request)
    {
		$hasil=false;
		$data=null;
		$pesan="Data tidak ditemukan";
        $posts = DB::table('karyawan')->select('nik','email','password')->where('email', [$request->email])->first(); // querybuilder
		//$posts = Karyawan::find($id);
		if($posts!=null){
			$passworddb=$posts->password;
			if(md5($request->password)==$passworddb){
				$hasil=true;
				$pesan="Data ditemukan";
				$data=$this->datakaryawan($posts->nik)[0];
			}
			else $pesan="Password Salah";
		}
		
		return new PostResource($hasil, $pesan, $data);
    }
	
	
	private function datakaryawan($nik){
		$posts= DB::select('select k.id,nik,nama,no_hp,email,alamat,tgl_gabung,k.status,imei,nama_divisi
			from (select * from karyawan where nik=? ) k join divisi d on k.id_divisi=d.id 
			',[$nik]);
			
			return $posts;
	}
	public function validasiregister(Request $request)
    {
		$hasil=false;
		$pesan="Data tidak ditemukan";
        $posts = DB::table('karyawan')->where('nik', [$request->nik])->first(); // querybuilder
		//$posts = Karyawan::find($id);
		if($posts!=null){
			$email=$posts->email;
			$hasil=true;
			$pesan="Data ditemukann";
		}
		
		return new PostResource($hasil, $pesan, null);
    }
	
	 public function cekemail(Request $request)
    {
		$hasil=false;
		$pesan="Data tidak ditemukan";
        $posts = DB::table('karyawan')->where('email', [$request->email])->first(); // querybuilder
	//$posts = Karyawan::find($id); why
		if($posts!=null){
			$email=$posts->email;
			$hasil=true;
			$pesan="Data ditemukan";
		}
		
		return new PostResource($hasil, $pesan, null);
    }
}
