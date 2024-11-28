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
        <form method="post" action="/superadmin/user/edit/{{$data->id}}">
            @csrf
        <fieldset>
            <div class="field">
               <label class="label_field">Nama Lengkap</label>
               <input type="text" class="form-control" name="name" value="{{$data->name}}" autocomplete="new-password">
            </div>
            <br/>
           <div class="field">
              <label class="label_field">Username</label>
              <input type="text" class="form-control" name="username" value="{{$data->name}}" readonly>
           </div>
           <br/>
           <div class="field">
              <label class="label_field">Password</label>
              <input type="password" class="form-control" name="password1" autocomplete="new-password">
           </div>
           <br/>
           <div class="field">
              <label class="label_field">Masukkan Password lagi</label>
              <input type="password" class="form-control" name="password2" autocomplete="new-password">
           </div>
           <br/>
           <div class="field">
              <label class="label_field">Role</label>
              <input type="text" class="form-control" name="role" value="{{$data->roles->first()->name}}" readonly>
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