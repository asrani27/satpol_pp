@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row column_title">
  <div class="col-md-12">
     <div class="page_title">
        <h2>Data Tindakan</h2>
     </div>
  </div>
</div>
<div class="white_shd full margin_bottom_30">
  <div class="full graph_head">
     <div class="heading1 margin_0">
       
      <a href="/superadmin/tindakan/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
     </div>
  </div>
  <div class="table_section padding_infor_info">
     <div class="table-responsive-sm">
        <table class="table table-bordered">
           <thead>
              <tr style="background-color: rgb(52, 52, 51); font-weight:bold;color:aliceblue">
                <th>No</th>
                <th>Tanggal</th>
                <th>Pengaduan</th>
                <th>Perda</th>
                <th>Hukuman</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
           </thead>
           <tbody>
            
            @foreach ($data as $key => $item)
            <tr>
              <td>{{$data->firstItem() + $key}}</td>
              <td>{{\Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y')}}</td>
              <td>{{$item->pengaduan == null ? null : $item->pengaduan->nomor}}</td>
              <td>{{$item->perda == null ? null : $item->perda->nama}}</td>
              <td>{{$item->hukuman}}</td>
              <td>{{$item->keterangan}}</td>
              <td>
                <a href="/superadmin/tindakan/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                <a href="/superadmin/tindakan/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
            @endforeach
           </tbody>
        </table>
     </div>
  </div>
  {{$data->links()}}
</div>

@endsection
@push('js')

@endpush
