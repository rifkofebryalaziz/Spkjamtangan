<?php

namespace App\Http\Controllers;


use App\Http\Controllers\LoginController;
use App\Models\alternatif;
use App\Models\baterai;
use App\Models\harga;
use App\Models\iprating;
use App\Models\Kriteria;
use App\Models\mdl;
use App\Models\tpelayar;
use App\Models\NormalizedMatrix;
use App\Models\WeightedMatrix;
use App\Models\IdealSolution;
use App\Models\SeparationMeasure;
use App\Models\RelativeCloseness;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


class HomeController extends Controller{
    public function dashboard(){
        $kriteria_count = Kriteria::count();
        $alternatif_count = alternatif::count();
        $user_count = User::count();

        return view('dashboard', ['user_count' => $user_count, 'kriteria_count' => $kriteria_count, 'alternatif_count' => $alternatif_count]);
    }
    // public function perhitungan()
    // {
    //     $altr = alternatif::get();
    //     return view('penilaian',compact('altr'));
    // }


    // public function hasilakhir(){
    //     return view('hasilakhir');
    // }

    public function datauser(){
        $user = User::get();
        return view('datauser',compact('user'));
    }

    public function dataprofile(){
        return view('dataprofile');
    }
    public function changePassword(Request $request){

       // Validasi input
       $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // dd($request->all());

    // Cek apakah password saat ini sesuai
    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
    }

    // Update password user
    auth::user()->update(['password' => Hash::make($request->new_password)]);

    return redirect()->route('dataprofile')->with('status', 'Password berhasil diubah.');
    }


    public function user(){
        $data = Kriteria::get();
        return view('index',compact('data'));
    }

    public function create(){
        return view('create');

    }

    public function store(Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            $kriteria = new Kriteria;
            $kriteria->nama = $data['NamaKrt'];
            $kriteria->flag = $data['KodeKriteria'];
            $kriteria->bobot = $data['Bobot'];
            $kriteria->label = $data['Jenis'];
            $kriteria->save();

            return redirect()->route('user');
        }
    //         $this->validate( $request, [
    //     'NamaKrt'     => 'required',
    //     'KodeKriteria'  => 'required',
    //     'Bobot'     => 'required',
    //     'Jenis'  => 'required',
    // ]);

    // Kriteria::create ([
    //     'nama' => $request->input('NamaKrt'),
    //     'flag' => $request->input('KodeKriteria'),
    //     'bobot' => $request->input('Bobot'),
    //     'label' => $request->input('Jenis')
    // ]);

    // return redirect()->route('user');

    }

    public function edit(Request $request,$id){
        $kriteria = Kriteria::find($id);

        return view('editcreate',compact('kriteria'));
    }
    public function update(Request $request, $id) {
        if ($request->isMethod('PUT')) {
            $data = $request->all();
            Kriteria::where(['id' => $id])->update([
                'nama' => $data['NamaKrt'],
                'flag' => $data['KodeKriteria'],
                'bobot' => $data['Bobot'],
                'label' => $data['Jenis']
            ]);
            return redirect()->route('user');
        }
    }
    public function delete(Request $request, $id){
        $data = Kriteria::find($id);

        if($data){
            $data->delete();
        }
        return redirect()->route('user');
    }

            // $kriteria = new Kriteria;
            // $kriteria->nama = $data['NamaKrt'];
            // $kriteria->flag = $data['KodeKriteria'];
            // $kriteria->bobot = $data['Bobot'];
            // $kriteria->label = $data['Jenis'];
            // $kriteria->save();

    public function user1(){
        $altr = alternatif::get();
        return view('dataalter',compact('altr'));
    }

    public function create1(){
        return view('createalt');
    }

    public function store1(Request $request){
        if($request->isMethod('POST')){
            $altr = $request->all();
            $alternatif = new alternatif;
            $alternatif->nama = $altr['namesm'];
            $alternatif->C1 = $altr['harga'];
            $alternatif->C2 = $altr['model'];
            $alternatif->C3 = $altr['wtrs'];
            $alternatif->C4 = $altr['tplyr'];
            $alternatif->C5 = $altr['baterai'];
            $alternatif->save();

            return redirect()->route('user1');
    }
}
    public function editalt(Request $request,$id){
        $alternatif = alternatif::find($id);

        return view('editcreatealt',compact('alternatif'));
    }
    public function updatealt(Request $request, $id) {
        if ($request->isMethod('PUT')) {
            $alternatif = $request->all();
            alternatif::where(['id' => $id])->update([
                'nama' => $alternatif['namesm'],
                'C1' => $alternatif['harga'],
                'C2' => $alternatif['model'],
                'C3' => $alternatif['wtrs'],
                'C4' => $alternatif['tplyr'],
                'C5' => $alternatif['baterai']
            ]);
            return redirect()->route('user1');
        }
    }
    public function deletealt(Request $request, $id){
        $alternatif = alternatif::find($id);

        if($alternatif){
            $alternatif->delete();
        }
        return redirect()->route('user1');
    }

    public function sub(){
        $harga = harga::get();
        $model = mdl::get();
        $iprat = iprating::get();
        $tpelayar = tpelayar::get();
        $baterai = baterai::get();
        return view('datasubkrt',compact('harga','model','iprat','tpelayar','baterai'));
    }

    public function createsubc1(){
        return view('createc1');
    }

    public function storesubc1(Request $request){
        if($request->isMethod('POST')){
            $hrg = $request->all();
            $harga = new harga;
            $harga->nama_sub1 = $hrg['Namasubkrtc1'];
            $harga->nilai1 = $hrg['nilaic1'];
            $harga->save();

            return redirect()->route('sub');
    }
    }
    public function editc1(Request $request,$id){
        $harga = harga::find($id);

        return view('editc1',compact('harga'));
    }
    public function updatec1(Request $request, $id) {
        if ($request->isMethod('PUT')) {
            $harga = $request->all();
            harga::where(['id' => $id])->update([
                'nama_sub1' => $harga['Namasubkrtc1'],
                'nilai1' => $harga['nilaic1']
            ]);
            return redirect()->route('sub');
        }
    }
    public function deletec1(Request $request, $id){
        $harga = harga::find($id);

        if($harga){
            $harga->delete();
        }
        return redirect()->route('sub');
    }
    public function createsubc2(){
        return view('createc2');
    }

    public function storesubc2(Request $request){
        if($request->isMethod('POST')){
            $mdl = $request->all();
            $model = new mdl;
            $model->nama_sub2 = $mdl['Namasubkrtc2'];
            $model->nilai2 = $mdl['nilaic2'];
            $model->save();

            return redirect()->route('sub');
    }
    }
    public function editc2(Request $request,$id){
        $model = mdl::find($id);

        return view('editc2',compact('model'));
    }
    public function updatec2(Request $request, $id) {
        if ($request->isMethod('PUT')) {
            $model = $request->all();
            mdl::where(['id' => $id])->update([
                'nama_sub2' => $model['Namasubkrtc2'],
                'nilai2' => $model['nilaic2']
            ]);
            return redirect()->route('sub');
        }
    }
    public function deletec2(Request $request, $id){
        $model = mdl::find($id);

        if($model){
            $model->delete();
        }
        return redirect()->route('sub');
    }
    public function createsubc3(){
        return view('createc3');
    }

    public function storesubc3(Request $request){
        if($request->isMethod('POST')){
            $ip = $request->all();
            $iprat = new iprating;
            $iprat->nama_sub3 = $ip['Namasubkrtc3'];
            $iprat->nilai3 = $ip['nilaic3'];
            $iprat->save();

            return redirect()->route('sub');
    }
    }
    public function editc3(Request $request,$id){
        $iprat = iprating ::find($id);

        return view('editc3',compact('iprat'));
    }
    public function updatec3(Request $request, $id) {
        if ($request->isMethod('PUT')) {
            $iprat = $request->all();
            iprating ::where(['id' => $id])->update([
                'nama_sub3' => $iprat['Namasubkrtc3'],
                'nilai3' => $iprat['nilaic3']
            ]);
            return redirect()->route('sub');
        }
    }
    public function deletec3(Request $request, $id){
        $iprat = iprating ::find($id);

        if($iprat){
            $iprat->delete();
        }
        return redirect()->route('sub');
    }
    public function createsubc4(){
        return view('createc4');
    }

    public function storesubc4(Request $request){
        if($request->isMethod('POST')){
            $tpl = $request->all();
            $tipelyr = new tpelayar;
            $tipelyr->nama_sub4 = $tpl['Namasubkrtc4'];
            $tipelyr->nilai4 = $tpl['nilaic4'];
            $tipelyr->save();

            return redirect()->route('sub');
    }
}
public function editc4(Request $request,$id){
    $tipelyr = tpelayar::find($id);

    return view('editc4',compact('tipelyr'));
}
public function updatec4(Request $request, $id) {
    if ($request->isMethod('PUT')) {
        $tipelyr = $request->all();
        tpelayar::where(['id' => $id])->update([
            'nama_sub4' => $tipelyr['Namasubkrtc4'],
            'nilai4' => $tipelyr['nilaic4']
        ]);
        return redirect()->route('sub');
    }
    }
    public function deletec4(Request $request, $id){
        $tipelyr = tpelayar::find($id);

        if($tipelyr){
            $tipelyr->delete();
        }
        return redirect()->route('sub');
    }
        public function createsubc5(){
            return view('createc5');
        }

    public function storesubc5(Request $request){
        if($request->isMethod('POST')){
            $btry = $request->all();
            $baterai = new baterai;
            $baterai->nama_sub5 = $btry['Namasubkrtc5'];
            $baterai->nilai5 = $btry['nilaic5'];
            $baterai->save();

            return redirect()->route('sub');
    }
}
public function editc5(Request $request,$id){
    $baterai = baterai::find($id);

    return view('editc5',compact('baterai'));
}
public function updatec5(Request $request, $id) {
    if ($request->isMethod('PUT')) {
        $baterai = $request->all();
        baterai::where(['id' => $id])->update([
            'nama_sub5' => $baterai['Namasubkrtc5'],
            'nilai5' => $baterai['nilaic5']
        ]);
        return redirect()->route('sub');
    }
}
public function deletec5(Request $request, $id){
    $baterai = baterai::find($id);

    if($baterai){
        $baterai->delete();
    }
    return redirect()->route('sub');
}
}
