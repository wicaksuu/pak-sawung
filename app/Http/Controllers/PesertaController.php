<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kaos;
use App\Models\Kecamatan;
use App\Models\Kelas;
use App\Models\Kota;
use Inertia\Inertia;
use App\Models\Peserta;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class PesertaController extends Controller
{
    //
    public function keluar(){
        Cookie::queue(Cookie::forget('id'));
        return Redirect::route('users');
    }
    public function action(){
        $user_id    = Cookie::get('id');
        if($user_id){
        return Redirect::route('users');
        }
        return Inertia::render('Welcome');
    }

    public function update(Request $request){
        $validation = $request->validate([
            'userId' => 'required|numeric|exists:pesertas,id',
            'email' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi_id' => 'required|not_in:""|not_in:0|numeric|exists:provinsis,id',
            'kota_id' => 'required|not_in:""|not_in:0|numeric|exists:kotas,id',
            'kecamatan_id' => 'required|not_in:""|not_in:0|numeric|exists:kecamatans,id',
            'desa_id' => 'required|not_in:""|not_in:0|numeric|exists:desas,id',
            'nik' => 'nullable|numeric|digits:16',

            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'kelas_id' => 'required|not_in:""|not_in:0|numeric|exists:kelas,id',
            'kaos_id' => 'required|not_in:""|not_in:0|numeric|exists:kaos,id',
            'tlp' => 'required|numeric|digits_between:10,12',
        ]);
        $user_id    = Cookie::get('id');
        if ($user_id != $validation['userId']) {
            return response()->json([
                'type' => 'error',
                'message' => 'Anda tidak punya akses ',
                'duration' => 5000
                ]); 
        }
        try {
            $peserta    = Peserta::findorFail($user_id);  
            if ($peserta) {
                    $email     = $validation['email'];
                    $alamat    = $validation['alamat'];
                    $provinsi  = $validation['provinsi_id'];
                    $kotas     = $validation['kota_id'];
                    $kecs      = $validation['kecamatan_id'];
                    $dess      = $validation['desa_id'];
                    $nik        = $validation['nik'];
                    $tempat_lahir   = $validation['tempat_lahir'];
                    $tanggal_lahir  = $validation['tanggal_lahir'];
                    $kelas_id       = $validation['kelas_id'];
                    $kaos_id        = $validation['kaos_id'];
                    $tlp            = $validation['tlp'];

                    $peserta->email = $email;
                    $peserta->alamat = $alamat;
                    $peserta->provinsi_id = $provinsi;
                    $peserta->kota_id = $kotas;
                    $peserta->kecamatan_id = $kecs;
                    $peserta->desa_id = $dess;
                    $peserta->nik = $nik;
                    $peserta->tempat_lahir = $tempat_lahir;
                    $peserta->tanggal_lahir = $tanggal_lahir;
                    $peserta->kelas_id = $kelas_id;
                    $peserta->kaos_id = $kaos_id;
                    $peserta->tlp = $tlp;
                    $peserta->save();

                    return response()->json([
                            'type' => 'success',
                            'message' => 'Data berhasil disimpan',
                            'duration' => 5000
                        ]); 
            }
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'error',
                'message' => $th->getMessage(),
                'duration' => 5000
                ]); 
        }        
    }
    public function dashboard(){
        $user_id    = Cookie::get('id');
        if ($user_id){
            $id=$user_id;
        }else{
        return Redirect::route('base');         
        }
        $pesertas    = Peserta::where('id',$id)->with([
            'provinsi', 
            'kota', 
            'kecamatan', 
            'desa', 
            'kelas', 
            'kaos'
            ])->get();  
        $peserta=$pesertas[0];
        $kelas      = Peserta::where('kelas_id',$peserta->kelas_id)->with([
            'provinsi', 
            'kota', 
            'kecamatan', 
            'desa', 
            'kelas', 
            'kaos'
            ])->get();  
        return Inertia::render('User',[
            'user' => $pesertas,
            'data'=>$peserta,
            'kelas'=>$kelas
        ]);

    }
    public function updateDashboard(){
    $user_id    = Cookie::get('id');
    if ($user_id){
        $id=$user_id;
    }else{
    return Redirect::route('base');         
    }
    $pesertas    = Peserta::where('id',$id)->with([
        'provinsi', 
        'kota', 
        'kecamatan', 
        'desa', 
        'kelas', 
        'kaos'
        ])->get();  
    $peserta=$pesertas[0];
    $kelas      = Peserta::where('kelas_id',$peserta->kelas_id)->where('id', '!=', $peserta->id)->with([
        'provinsi', 
        'kota', 
        'kecamatan', 
        'desa', 
        'kelas', 
        'kaos'
        ])->get();  


    return response()->json([
        'user' => $peserta,
        'kelas'=>$kelas
        ]); 

    }

    public function getUser(Request $request)
    {
        $data = Peserta::where('nama', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data); 
    }

    public function user($id)
    {
        
        $user_id    = Cookie::get('id');
        if ($user_id){
            $id=$user_id;
        }
        $peserta    = Peserta::findorFail($id);  
        if ($peserta) {
        Cookie::queue('id', $peserta->id, 120);  
        if ($peserta->alamat=='') {
            return Inertia::render('IsiData',[
                'data'=>$peserta,
                'provinsi'=>Provinsi::all(),
                'kelas'=>Kelas::all(),
                'kaos'=>Kaos::all(),
            ]);
        } else{
            return redirect('/user');

        }     
        }else{
            return back();
        }
    }
    public function provinsi(){
        $provinsi = Provinsi::all();
        return response()->json($provinsi); 
    }
    public function kelas(){
        $kelas = Kelas::all();
        return response()->json($kelas); 
    }
    public function kaos(){
        $kaos = Kaos::all();
        return response()->json($kaos); 
    }
    public function kota($id)
    {
        $kota = Kota::where('id_provinsi',$id)->get();  
        return response()->json($kota); 
    }
    public function kec( $id)
    {
        $kec = Kecamatan::where('id_kota',$id)->get();  
        return response()->json($kec); 
    }
    public function des( $id)
    {
        $des = Desa::where('id_kecamatan',$id)->get();  
        return response()->json($des); 
    }

    public function alamat(Request $request){
        
        $validation = $request->validate([
            'userId' => 'required|numeric|exists:pesertas,id',
            'email' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|not_in:""|not_in:0|numeric|exists:provinsis,id',
            'kotas' => 'required|not_in:""|not_in:0|numeric|exists:kotas,id',
            'kecs' => 'required|not_in:""|not_in:0|numeric|exists:kecamatans,id',
            'dess' => 'required|not_in:""|not_in:0|numeric|exists:desas,id',
            'nik' => 'nullable|numeric|digits:16',

            'tempatLahir' => 'required|string|max:255',
            'tanggalLahir' => 'required|string|max:255',
            'kelas' => 'required|not_in:""|not_in:0|numeric|exists:kelas,id',
            'kaos' => 'required|not_in:""|not_in:0|numeric|exists:kaos,id',
            'tlp' => 'required|numeric|digits_between:10,12',
        ]);
        $userId    = $validation['userId'];
        $email     = $validation['email'];
        $alamat    = $validation['alamat'];
        $provinsi  = $validation['provinsi'];
        $kotas     = $validation['kotas'];
        $kecs      = $validation['kecs'];
        $dess      = $validation['dess'];
        $nik       = $validation['nik'];

        $tempat_lahir   = $validation['tempatLahir'];
        $tanggal_lahir  = $validation['tanggalLahir'];
        $kelas_id       = $validation['kelas'];
        $kaos_id        = $validation['kaos'];
        $tlp            = $validation['tlp'];

        $user           = Peserta::findorFail($userId);

        if ($user) {
            $user->email = $email;
            $user->nik = $nik;
            $user->alamat = $alamat;
            $user->provinsi_id = $provinsi;
            $user->kota_id = $kotas;
            $user->kecamatan_id = $kecs;
            $user->desa_id = $dess;
            $user->tempat_lahir = $tempat_lahir;
            $user->tanggal_lahir = $tanggal_lahir;
            $user->kelas_id = $kelas_id;
            $user->kaos_id = $kaos_id;
            $user->tlp = $tlp;
            $user->save();
            return redirect('user');
            
        }

    }
}
