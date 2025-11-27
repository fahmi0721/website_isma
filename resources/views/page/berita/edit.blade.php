@extends('layouts.app')
@section('title','Update New Berita')
@section('breadcrumb')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-sm-6"><h5 class="mb-2">Update New Berita</h5></div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.berita') }}">Berita</a></li>
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
                <div class="card-header"><div class="card-title">Update New Berita</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action='javascript:void(0)' enctype="multipart/form-data" id="form_data">
                    @csrf
                    @method("put")
                    <input type="hidden" value="{{ $id }}" id='id' name='id'>
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-3 col-form-label">Judul <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul" value="{{ $data->title }}" name="judul" placeholder="Judul Berita" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="isi_berita" class="col-sm-3 col-form-label">Isi Berita</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control"  rows='10' id="isi_berita" name="isi_berita" placeholder="Isi Berita">{{ $data->content }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Berita <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tanggal" value="{{ $data->date }}" name="tanggal" placeholder="Tanggal Berita" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tags" class="col-sm-3 col-form-label">Tags <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <select name="tags[]" id="tags" class="form-control tags" multiple="multiple">
                                     @foreach($data->tags as $tag)
                                        <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Pisahkan dengan Enter. Contoh: politik, ekonomi, teknologi</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-3 col-form-label">Gambar Utama <b class='text-danger'>*</b></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" placeholder="Gambar Utama" />
                                <small><a target='_blank' href="{{ asset('uploads/images/news/'.$data->image) }}">Gambar Lama</a></small>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <a href="{{ route('admin.berita') }}" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-mail-reply"></i> Kembali</a>
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
    $('#tags').select2({
        tags: true,
        tokenSeparators: [',', ' '],
        placeholder: "Tambahkan tags",
        width: '100%'
    });
    flatpickr("#tanggal", {
        altInput: true,
        altFormat: "d F Y",   // tampilan di input: 10 Juli 2025
        dateFormat: "Y-m-d",  // format yang dikirim ke backend: 2025-07-10
        allowInput: false,
        locale: "id"
    });
    ClassicEditor
    .create(document.querySelector('#isi_berita'), {
        alignment: {
            options: ['left', 'center', 'right', 'justify']
        }
    })
    .then(editor => {
        // Tinggi editor stabil
        editor.ui.view.editable.element.style.minHeight = '400px';
    })
    .catch(error => {
        console.error(error);
    });
    proses_data = function(){
        let iData = new FormData(document.getElementById("form_data"));
        $.ajax({
            type    : "POST",
            url     : "{{ route('admin.berita.update', [':id']) }}".replace(':id', id),
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
                        window.location.href = "{{ route('admin.berita') }}";
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

