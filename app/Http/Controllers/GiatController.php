<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;
class GiatController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = DB::table("moment")->select('id',"image","title","description")->orderBy("id","desc")->get();
            return  Datatables::of($query)
                ->addIndexColumn()
                
                 // Tampilkan image dalam <img>
                ->editColumn('image', function($row){
                    if (!$row->image) {
                        return '<span class="text-muted">No Image</span>';
                    }

                    $url = asset('uploads/images/giat/'.$row->image); // sesuaikan folder kamu
                    return '<img src="'.$url.'" style="max-width:100px;" class="img-fluid" />';
                })
                ->addColumn('aksi', function ($row) {
                    $url = route('admin.giat.edit')."?id=".$row->id;
                return '
                    <a title="Update Data" data-bs-toggle="tooltip" class="btn btn-sm btn-primary btn-edit" href="'.$url.'"><i class="fa fa-edit"></i></a>
                    <button title="Hapus Data" data-bs-toggle="tooltip" class="btn btn-sm btn-danger btn-delete" onclick="hapusData('.$row->id.')"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi','image'])
            
            ->make(true);
        }else{
            return view("page.giat.index");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("page.giat.tambah");
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validates 	= [
            "judul"  => "required",
            "deskripsi"  => "required",
            'image'   => 'required|image|mimes:jpg,jpeg,png,webp|max:5048'
        ];

        $messages = [
            "judul.required" => "Judul Wajib diisi!",
            "deskripsi.required" => "Deskripsi Wajib diisi!",
            "image.required" => "Image Wajib diisi!",
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');             // FIX
            $imageName = time() . '.' . $file->extension();
            $file->move(base_path('../../public_html/uploads/images/giat'), $imageName);
            // $file->move(public_path('uploads/images/giat'), $imageName);
        }
        $detail =  $request->tags;
        DB::beginTransaction();
        try {
            $data['title'] = $request->judul;
            $data['description'] = $request->deskripsi;
            $data['image'] = $imageName;
            $id = DB::table("moment")->insert($data);
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
        $data = DB::table("moment")->where("id",$id)->first();
        return view("page.giat.edit",compact("data","id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validates  = [
            "id"         => "required",
            "judul"  => "required",
            "deskripsi"  => "required",
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5048'
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

            if ($request->hasFile('image')) {
                // hapus gambar lama
                // if ($imageName && file_exists(public_path('uploads/images/giat/' . $imageName))) {
                //     unlink(public_path('uploads/images/giat/' . $imageName));
                // }
                if ($imageName && file_exists(base_path('../../public_html/uploads/images/giat' . $imageName))) {
                    unlink(base_path('../../public_html/uploads/images/giat' . $imageName));
                }
                $file = $request->file('image');
                $imageName = time() . '.' . $file->extension();
                $file->move(base_path('../../public_html/uploads/images/giat' . $imageName));
            }


            DB::table("moment")->where("id", $request->id)->update([
                'title'   => $request->judul,
                'description' => $request->deskripsi,
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
            $data = DB::table('moment')->where('id', $id)->first();

            if ($data && $data->image) {
                $path = base_path('../../public_html/uploads/images/giat' . $data->image);
                if (file_exists($path)) {
                    unlink($path); // hapus file gambar
                }
            }

            DB::table('moment')->where("id", $id)->delete();

            DB::commit();
            return response()->json(['status'=>'success', 'messages'=>"Data berhasil dihapus."], 200);

        } catch(QueryException $e) { 
            DB::rollback();
            return response()->json(['status'=>'error','messages'=> $e->errorInfo ], 500);
        }
        
    }
}
