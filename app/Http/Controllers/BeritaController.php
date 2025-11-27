<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;
class BeritaController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = DB::table("news")->select('id',"content","date","author","image","title")->orderBy("id","desc")->get();
            return  Datatables::of($query)
                ->addIndexColumn()
                 ->editColumn('content', function($row){
                    $clean = strip_tags($row->content);        // buang tag HTML
                    return Str::limit($clean, 80, '...');      // batasi maksimal 80 char
                })
                ->editColumn('date', function($row){
                    if (!$row->date) return '-';

                    return Carbon::parse($row->date)
                        ->locale('id')                     // bahasa Indonesia
                        ->translatedFormat('d F Y');       // contoh: 27 November 2025
                })
                 // Tampilkan image dalam <img>
                ->editColumn('image', function($row){
                    if (!$row->image) {
                        return '<span class="text-muted">No Image</span>';
                    }

                    $url = asset('uploads/images/news/'.$row->image); // sesuaikan folder kamu
                    return '<img src="'.$url.'" style="max-width:100px;" class="img-fluid" />';
                })
                ->addColumn('aksi', function ($row) {
                    $url = route('admin.berita.edit')."?id=".$row->id;
                return '
                    <a title="Update Data" data-bs-toggle="tooltip" class="btn btn-sm btn-primary btn-edit" href="'.$url.'"><i class="fa fa-edit"></i></a>
                    <button title="Hapus Data" data-bs-toggle="tooltip" class="btn btn-sm btn-danger btn-delete" onclick="hapusData('.$row->id.')"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi','image'])
            
            ->make(true);
        }else{
            return view("page.berita.index");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("page.berita.tambah");
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validates 	= [
            "judul"  => "required",
            "isi_berita"  => "required",
            "tanggal"  => "required|date",
            "tags"  => "required",
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];

        $validation = Validator::make($request->all(), $validates);
        if($validation->fails()) {
            return response()->json([
                "status"    => "warning",
                "messages"   => $validation->errors()->first()
            ], 401);
        }
        // upload gambar
        $imageName = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');             // FIX
            $imageName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/images/news'), $imageName);
        }
        $detail =  $request->tags;
        DB::beginTransaction();
        try {
            $data['title'] = $request->judul;
            $data['content'] = $request->isi_berita;
            $data['detail'] = implode(',', $detail);
            $data['date'] = $request->tanggal;
            $data['author'] = "Admin";
            $data['image'] = $imageName;
            $id = DB::table("news")->insert($data);
            DB::commit();
            return response()->json(['status'=>'success', 'messages'=>"Data berhasil disimpan."], 200);
        } catch(QueryException $e) { 
            DB::rollback();
            return response()->json(['status'=>'error','messages'=> $e->errorInfo ], 500);
        }  
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = DB::table("news")->where("id",$id)->first();
        $data->tags = $data->detail ? explode(',', $data->detail) : [];
        return view("page.berita.edit",compact("data","id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validates  = [
            "id"         => "required",
            "judul"      => "required",
            "isi_berita" => "required",
            "tanggal"    => "required|date",
            "tags"       => "required",
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];

        $validation = Validator::make($request->all(), $validates);
        if($validation->fails()) {
            return response()->json([
                "status"=>"warning",
                "messages"=>$validation->errors()->first()
            ], 401);
        }

        DB::beginTransaction();
        try {

            // Upload gambar baru jika ada
            $imageName = $request->old_image;

            if ($request->hasFile('gambar')) {

                // hapus gambar lama
                if ($imageName && file_exists(public_path('uploads/images/news/' . $imageName))) {
                    unlink(public_path('uploads/images/news/' . $imageName));
                }

                $file = $request->file('gambar');
                $imageName = time() . '.' . $file->extension();
                $file->move(public_path('uploads/images/news'), $imageName);
            }

            $detail = implode(',', $request->tags);

            DB::table("news")->where("id", $request->id)->update([
                'title'   => $request->judul,
                'content' => $request->isi_berita,
                'detail'  => $detail,
                'date'    => $request->tanggal,
                'author'  => "Admin",
                'image'   => $imageName,
            ]);

            DB::commit();
            return response()->json(['status'=>'success', 'messages'=>"Data berhasil diperbarui."], 200);

        } catch(QueryException $e) {
            DB::rollback();
            return response()->json(['status'=>'error','messages'=> $e->errorInfo ], 500);
        }
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        if (!$id) {
            return response()->json([
                'status' => 'error',
                'messages' => 'ID tidak ditemukan.'
            ], 400);
        }

        DB::beginTransaction();
        try {
            // Ambil data untuk hapus gambar fisik
            $data = DB::table('news')->where('id', $id)->first();

            if ($data && $data->image) {
                $path = public_path('uploads/images/news/' . $data->image);
                if (file_exists($path)) {
                    unlink($path); // hapus file gambar
                }
            }

            DB::table('news')->where("id", $id)->delete();

            DB::commit();
            return response()->json(['status'=>'success', 'messages'=>"Data berhasil dihapus."], 200);

        } catch(QueryException $e) { 
            DB::rollback();
            return response()->json(['status'=>'error','messages'=> $e->errorInfo ], 500);
        }
    }
}
