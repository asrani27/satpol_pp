@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
    <div class="col-md-12">
       <div class="page_title">
          <h2>Tambah Data</h2>
       </div>
    </div>
  </div>
  <div class="white_shd full margin_bottom_30">
    <div class="padding_infor_info">
        <form method="post" action="/superadmin/lokasi/create">
            @csrf
        <fieldset>
            <div class="field">
               <label class="label_field">Nama Lokasi</label>
               <input type="text" class="form-control" name="nama">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Kelurahan</label>
               <input type="text" class="form-control" name="kelurahan">
            </div>
            <br/>
           <div class="field">
              <label class="label_field">Kecamatan</label>
              <input type="text" class="form-control" name="kecamatan">
           </div>
           <br/>
           
           <div class="field margin_0">
            
              <button class="main_bt"><i class="fa fa-save"></i> Simpan</button>
           </div>
        </fieldset>
        </form>
    </div>
  </div>
  
@endsection
@push('js')

@endpush