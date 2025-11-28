<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;
class KontakController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = DB::table("contact")->select('id',"section","type","label","value")->orderBy("id","desc")->get();
            return  Datatables::of($query)
                ->addIndexColumn()
                
                ->addColumn('aksi', function ($row) {
                    $url = route('admin.kontak.edit')."?id=".$row->id;
                return '
                    <a title="Update Data" data-bs-toggle="tooltip" class="btn btn-sm btn-primary btn-edit" href="'.$url.'"><i class="fa fa-edit"></i></a>
                    <button title="Hapus Data" data-bs-toggle="tooltip" class="btn btn-sm btn-danger btn-delete" onclick="hapusData('.$row->id.')"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi'])
            
            ->make(true);
        }else{
            return view("page.kontak.index");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("page.kontak.tambah");
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validates 	= [
            "section"  => "required",
            "type"  => "required",
            "label"  => "required",
            "value"  => "required",
        ];

        $messages = [
            "section.required" => "Section Wajib diisi!",
            "type.required" => "Type Wajib diisi!",
            "label.required" => "Label Wajib diisi!",
            "value.required" => "Value Wajib diisi!",
        ];

        $validation = Validator::make($request->all(), $validates);
        if($validation->fails()) {
            return response()->json([
                "status"    => "warning",
                "messages"   => $validation->errors()->first()
            ], 401);
        }
        
        DB::beginTransaction();
        try {
            $data['section'] = $request->section;
            $data['type'] = $request->type;
            $data['label'] = $request->label;
            $data['value'] = $request->value;
            $id = DB::table("contact")->insert($data);
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
        $data = DB::table("contact")->where("id",$id)->first();
        return view("page.kontak.edit",compact("data","id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validates  = [
            "id"         => "required",
            "section"  => "required",
            "type"  => "required",
            "label"  => "required",
            "value"  => "required",
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


            DB::table("contact")->where("id", $request->id)->update([
                'section'   => $request->section,
                'type' => $request->type,
                'label' => $request->label,
                'value' => $request->value,
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

            DB::table('contact')->where("id", $id)->delete();

            DB::commit();
            return response()->json(['status'=>'success', 'messages'=>"Data berhasil dihapus."], 200);

        } catch(QueryException $e) { 
            DB::rollback();
            return response()->json(['status'=>'error','messages'=> $e->errorInfo ], 500);
        }
        
    }
}
