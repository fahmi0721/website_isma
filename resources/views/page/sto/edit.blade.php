@extends('layouts.app')
@section('title','Update Struktur Organisasi')
@section('breadcrumb')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-sm-6"><h5 class="mb-2">Update Struktur Organisasi</h5></div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.sto') }}">Struktur Organisasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
        </div>
    </div>
    <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
@section('content')
<style>
.ck-editor__editable_inline {
    min-height: 350px !important;
    height: 350px !important;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline mb-4">
                <div class="card-header"><div class="card-title">Update Struktur Organisasi</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action='javascript:void(0)' enctype="multipart/form-data" id="form_data">
                    @csrf
                    @method("put")
                    <input type="hidden" value="{{ $id }}" id='id' name='id'>
                    <input type="hidden" value="{{ $data->foto }}" id='old_image' name='old_image'>
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" value="{{ $data->nama }}" name="nama" placeholder="Nama" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jabatan" value="{{ $data->jabatan }}" name="jabatan" placeholder="Jabatan" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jabatan" class="col-sm-3 col-form-label">Deskripsi <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" rows='3'  id="deskripsi" name="deskripsi" placeholder="Deskripsi">{{ $data->deskripsi }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="urutan" class="col-sm-3 col-form-label">Urutan  <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="urutan" value="{{ $data->urutan }}" name="urutan" placeholder="Urutan" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto" class="col-sm-3 col-form-label">Foto <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" placeholder="Foto" />
                                <small><a target='_blank' href="{{ asset('uploads/images/struktur/'.$data->foto) }}">Foto Lama</a></small>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <a href="{{ route('admin.sto') }}" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-mail-reply"></i> Kembali</a>
                      <button type="submit" id="btn-submit" class="btn btn-success btn-flat btn-sm float-end"><i class="fa fa-save"></i> Simpan</button>
                  </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>  
        </div>
    </div>    
</div>
@endsection
@section('js')
<script>
    proses_data = function(){
        let iData = new FormData(document.getElementById("form_data"));
        $.ajax({
            type    : "POST",
            url     : "{{ route('admin.sto.update', [':id']) }}".replace(':id', id),
            data    : iData,
            cache   : false,
            processData: false,
            contentType: false,
            beforeSend  : function (){
                $("#btn-submit").html("<i class='fa fa-spinner fa-spin'></i>  Simpan..")
                $("#btn-submit").prop("disabled",true);
            },
            success: function(result){
                console.log(result)
                if(result.status == "success"){
                    position = "bottom-left";
                    icons = result.status;
                    pesan = result.messages;
                    title = "Saved!";
                    info(title,pesan,icons,position);
                    $("#btn-submit").html("<i class='fa fa-save'></i> Simpan")
                    $("#btn-submit").prop("disabled",false);
                    setTimeout(() => {
                        window.location.href = "{{ route('admin.sto') }}";
                    }, 2000);
                    
                }
            },
            error: function(e){
                console.log(e)
                $("#btn-submit").html("<i class='fa fa-save'></i> Simpan")
                $("#btn-submit").prop("disabled",false);
                error_message(e,'Proses Data Error');
            }
        })
    }

    $(function() {
        $("#form_data").submit(function(e){
            e.preventDefault();
            proses_data();
        });
    });
</script>
@endsection

