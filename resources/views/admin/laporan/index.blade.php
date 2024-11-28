@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row column_title">
  <div class="col-md-12">
     <div class="page_title">
        <h2>Laporan</h2>
     </div>
  </div>
</div>
<div class="white_shd full margin_bottom_30">
  <div class="full graph_head">
     <div class="heading1 margin_0">
      <form method="get" action="/superadmin/laporan/print" target="_blank">
         @csrf
       <select class="form-control" name="bulan" required>
          <option value="">-bulan-</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
       </select>
       <br>
       <select class="form-control" name="tahun" required>
          <option value="">-tahun-</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
       </select>
       <br>
       <select class="form-control" name="jenis" required>
          <option value="">-jenis-</option>
          <option value="1">Laporan Pengaduan</option>
          <option value="2">Laporan Tindakan</option>
       </select>
       <br/>
      <button type="submit" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>

      </form>
     </div>
  </div>
  
</div>

@endsection
@push('js')

@endpush
