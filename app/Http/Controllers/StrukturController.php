<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;
class StrukturController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = DB::table("struktur_jabatan")->select('id',"jabatan","nama","deskripsi","foto","urutan")->orderBy("id","desc")->get();
            return  Datatables::of($query)
                ->addIndexColumn()
                
                 // Tampilkan image dalam <img>
                ->editColumn('foto', function($row){
                    if (!$row->foto) {
                        return '<span class="text-muted">No Image</span>';
                    }

                    $url = asset('uploads/images/struktur/'.$row->foto); // sesuaikan folder kamu
                    return '<img src="'.$url.'" style="max-width:100px;" class="img-fluid" />';
                })
                ->addColumn('aksi', function ($row) {
                    $url = route('admin.sto.edit')."?id=".$row->id;
                return '
                    <a title="Update Data" data-bs-toggle="tooltip" class="btn btn-sm btn-primary btn-edit" href="'.$url.'"><i class="fa fa-edit"></i></a>
                    <button title="Hapus Data" data-bs-toggle="tooltip" class="btn btn-sm btn-danger btn-delete" onclick="hapusData('.$row->id.')"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi','foto'])
            
            ->make(true);
        }else{
            return view("page.sto.index");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("page.sto.tambah");
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validates 	= [
            "nama"  => "required",
            "jabatan"  => "required",
            "deskripsi"  => "required",
            "urutan"  => "required|integer",
            'foto'   => 'required|image|mimes:jpg,jpeg,png,webp|max:5048'
        ];

        $messages = [
            "nama.required" => "Nama Wajib diisi!",
            "jabatan.required" => "Jabatan Wajib diisi!",
            "deskripsi.required" => "Deskripsi Wajib diisi!",
            "urutan.required" => "Urutan Wajib diisi!",
            "urutan.integer" => "Urutan Wajib angka!",
            "foto.required" => "Urutan Wajib diisi!",
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
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');             // FIX
            $imageName = time() . '.' . $file->extension();
            $file->move(base_path('../../public_html/uploads/images/struktur'), $imageName);
            // $file->move(public_path('uploads/images/struktur'), $imageName);
        }
        $detail =  $request->tags;
        DB::beginTransaction();
        try {
            $data['nama'] = $request->nama;
            $data['jabatan'] = $request->jabatan;
            $data['deskripsi'] = $request->deskripsi;
            $data['urutan'] = $request->urutan;
            $data['foto'] = $imageName;
            $id = DB::table("struktur_jabatan")->insert($data);
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
        $data = DB::table("struktur_jabatan")->where("id",$id)->first();
        return view("page.sto.edit",compact("data","id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validates  = [
            "id"         => "required",
           "nama"  => "required",
            "jabatan"  => "required",
            "deskripsi"  => "required",
            "urutan"  => "required",
            'foto'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5048'
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

            if ($request->hasFile('foto')) {
                // hapus gambar lama
                // if ($imageName && file_exists(public_path('uploads/images/struktur/' . $imageName))) {
                //     unlink(public_path('uploads/images/struktur/' . $imageName));
                // }
                if ($imageName && file_exists(base_path('../../public_html/uploads/images/struktur' . $imageName))) {
                    unlink(base_path('../../public_html/uploads/images/struktur' . $imageName));
                }
                $file = $request->file('foto');
                $imageName = time() . '.' . $file->extension();
                $file->move(base_path('../../public_html/uploads/images/struktur'), $imageName);
            }


            DB::table("struktur_jabatan")->where("id", $request->id)->update([
                'nama'   => $request->nama,
                'jabatan' => $request->jabatan,
                'deskripsi' => $request->deskripsi,
                'urutan' => $request->urutan,
                'foto'   => $imageName,
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
            $data = DB::table('struktur_jabatan')->where('id', $id)->first();

            if ($data && $data->foto) {
                $path = base_path('../../public_html/uploads/images/struktur' . $data->foto);
                if (file_exists($path)) {
                    unlink($path); // hapus file gambar
                }
            }

            DB::table('struktur_jabatan')->where("id", $id)->delete();

            DB::commit();
            return response()->json(['status'=>'success', 'messages'=>"Data berhasil dihapus."], 200);

        } catch(QueryException $e) { 
            DB::rollback();
            return response()->json(['status'=>'error','messages'=> $e->errorInfo ], 500);
        }
        
    }
}
