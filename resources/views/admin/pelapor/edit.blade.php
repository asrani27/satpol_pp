@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
    <div class="col-md-12">
       <div class="page_title">
          <h2>Edit Data</h2>
       </div>
    </div>
  </div>
  <div class="white_shd full margin_bottom_30">
    <div class="padding_infor_info">
        <form method="post" action="/superadmin/pelapor/edit/{{$data->id}}">
            @csrf
        <fieldset>
            <div class="field">
               <label class="label_field">Nama Pelapor</label>
               <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Agama</label>
               <select class="form-control" name="agama">
                  <option value="ISLAM" {{$data->agama == 'ISLAM' ? 'selected':''}}>ISLAM</option>
                  <option value="KRISTEN" {{$data->agama == 'KRISTEN' ? 'selected':''}}>KRISTEN</option>
                  <option value="KATOLIK" {{$data->agama == 'KATOLIK' ? 'selected':''}}>KATOLIK</option>
                  <option value="HINDU" {{$data->agama == 'HINDU' ? 'selected':''}}>HINDU</option>
                  <option value="BUDHA" {{$data->agama == 'BUDHA' ? 'selected':''}}>BUDHA</option>
               </select>
            </div>
            <br/>
           <div class="field">
              <label class="label_field">alamat</label>
              <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
           </div>
           <br/>
           <div class="field">
              <label class="label_field">telp</label>
              <input type="text" class="form-control" name="telp" value="{{$data->telp}}">
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