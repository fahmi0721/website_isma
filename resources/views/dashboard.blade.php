{{-- resources/views/dashboard/keuangan.blade.php --}}
@extends('layouts.app')

@section('title','Dashboard PT INTAN SEJAHTERA UTAMA')

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <div class="mb-3 d-flex align-items-center mt-4">
    <h5 class="mb-0">Dashboard Keuangan</h5>
</div>

{{-- Ringkasan KPI --}}
<div class="row g-2 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon text-bg-primary shadow-sm">
            <i class="bi bi-building"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Total Aset</span>
            <span class="info-box-number" id="kpi_aset">-</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon text-bg-danger shadow-sm">
            <i class="bi bi-bank"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Total Liabilitas</span>
            <span class="info-box-number" id="kpi_liabilitas">-</span>
            </div>
            <!-- /.info-box-content -->
        </div>
       
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon text-bg-success shadow-sm">
            <i class="bi bi-cash-stack"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Kas</span>
            <span class="info-box-number" id="kpi_kas">-</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon text-bg-warning shadow-sm">
            <i class="bi bi-receipt"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Piutang</span>
            <span class="info-box-number" id="kpi_piutang">-</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection
