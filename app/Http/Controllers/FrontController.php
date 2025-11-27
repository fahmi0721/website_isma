<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $beritas = DB::table('news')->orderBy('date','desc')->limit(4)->get();
        $giats = DB::table('moment')->orderBy('id','desc')->get();
        $kontaks = $this->getKontak();
        return view("page.front.home",compact('beritas','giats','kontaks'));
    }

    public function berita_detail(Request $request){
        $id = $request->id;
        $data = DB::table('news')->where("id",$id)->first();
        return view("page.front.berita_detail",compact('data'));
    }

    public function berita(Request $request){
        $data = DB::table('news')->orderBy('date','desc')->get();
        return view("page.front.berita",compact('data'));
    }

    public function aspek_hukum(Request $request){
        $sertifikats = DB::table('sub1')->where("section","sertifikasi")->orderBy('id','desc')->get();
        $mandatoris = DB::table('sub1')->where("section","mandatory")->orderBy('id','desc')->get();
        $landasans = DB::table('sub1')->where("section","landasan")->orderBy('id','desc')->get();
        return view("page.front.aspek_hukum",compact('sertifikats','mandatoris','landasans'));
    }

    public function pemegang_saham(Request $request){
        $members = DB::table('struktur_jabatan')->orderBy('urutan','asc')->get();
        return view("page.front.pemegang_saham", compact('members'));
    }

    public function bisnis_proses(Request $request){
        return view("page.front.bisnis_proses");
    }

    public function sebaran_tk(Request $request){
        return view("page.front.sebaran_tk");
    }

    public function sertifikat(Request $request){
        $data = DB::table('sertifikat')->orderBy('created_at','desc')->get();
        return view("page.front.sertifikat",compact("data"));
    }

    public function pembelajaran(Request $request){
        if ($request->ajax()) {
            $query = DB::table('pembelajaran');

            return DataTables::of($query)
                ->addIndexColumn()

                ->editColumn('image', function ($row) {
                    $img = asset('uploads/images/'.$row->image);
                    return "<img src='".$img."' class='img-responsive' style='max-width:250px'>";
                })
                ->editColumn('video', function ($row) {
                    $btn = $row->category == 'general' ? '<a title="Nonton Video" target="_blank" data-toggle="tooltip" href="' . $row->video . '" class="btn btn-primary btn-edit"><i class="fas fa-video"></i></a>' : '<button title="Buka Akses" data-toggle="tooltip" href="#" class="btn btn-warning btn-edit"><i class="fas fa-lock"></i></button>';
                    return $btn;
                })

                ->rawColumns(['video', 'image'])
                ->make(true);
        }

        return view("page.front.pembelajaran");
    }


    public function mitra(Request $request){
        $p_groups = DB::table('sub5')->where('kategori','Pelindo Group')->orderBy('id','desc')->get();
        $n_plds = DB::table('sub5')->where('kategori','Non Pelindo')->orderBy('id','desc')->get();
        $orgs = DB::table('sub5')->where('kategori','Organisasi')->orderBy('id','desc')->get();
        return view("page.front.mitra",compact("p_groups",'orgs',"n_plds"));
    }




    private function getKontak(){
        $kontaks = DB::table('contact')->orderBy('id','desc')->where('section','contact')->get();
        $icons = [
            "Youtube"   => "bi-youtube",
            "Instagram" => "bi-instagram",
            "Facebook"  => "bi-facebook",
            "X"         => "bi-twitter-x"
        ];
        $baseUrls = [
            "Youtube"   => "https://youtube.com/",
            "Instagram" => "https://instagram.com/",
            "Facebook"  => "https://facebook.com/",
            "X"         => "https://x.com/"
        ];
        $data = array();
        $posisi = 0;
        foreach($kontaks as $kontak){
            $data[$posisi]['icon'] = $icons[$kontak->type];
            $data[$posisi]['url'] = $baseUrls[$kontak->type];
            $data[$posisi]['label'] = $kontak->label;
            $data[$posisi]['value'] = $kontak->value;
            $posisi++;
        }
        return $data;

    }

    

    
}
