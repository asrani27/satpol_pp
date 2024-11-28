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
        <form method="post" action="/superadmin/pengaduan/edit/{{$data->id}}">
            @csrf
        <fieldset>

            <div class="field">
               <label class="label_field">Nomor</label>
               <input type="text" class="form-control" name="nomor" value="{{$data->nomor}}" required>
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Nama Pelapor</label>
               <select class="form-control" name="pelapor_id" required>
                  <option value="">-pilih-</option>
                  @foreach (pelapor() as $item)
                  <option value="{{$item->id}}" {{$data->pelapor_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                  @endforeach
               </select>
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Nama Petugas</label>
               <select class="form-control" name="petugas_id" required>
                  <option value="">-pilih-</option>
                  @foreach (petugas() as $item)
                  <option value="{{$item->id}}" {{$data->petugas_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                  @endforeach
               </select>
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Lokasi</label>
               <select class="form-control" name="lokasi_id" required>
                  <option value="">-pilih-</option>
                  @foreach (lokasi() as $item)
                  <option value="{{$item->id}}" {{$data->lokasi_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                  @endforeach
               </select>
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Jenis Aduan</label>
               <input type="text" class="form-control" name="jenis" value="{{$data->jenis}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Isi Aduan</label>
               <input type="text" class="form-control" name="isi" value="{{$data->isi}}">
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