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
        <form method="post" action="/superadmin/tindakan/edit/{{$data->id}}">
            @csrf
        <fieldset>
            <div class="field">
               <label class="label_field">Pengaduan</label>
               <select class="form-control" name="pengaduan_id" required>
                  <option value="">-pilih-</option>
                  @foreach (pengaduan() as $item)
                  <option value="{{$item->id}}" {{$data->pengaduan_id == $item->id ? 'selected':''}}>{{$item->nomor}}</option>
                  @endforeach
               </select>
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Perda</label>
               <select class="form-control" name="perda_id" required>
                  <option value="">-pilih-</option>
                  @foreach (perda() as $item)
                  <option value="{{$item->id}}" {{$data->perda_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                  @endforeach
               </select>
            </div>
            <br/>
            <div class="field">
               <label class="label_field">HUkuman</label>
               <input type="text" class="form-control" name="hukuman" value="{{$data->hukuman}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Keterangan</label>
               <input type="text" class="form-control" name="keterangan" value="{{$data->keterangan}}">
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