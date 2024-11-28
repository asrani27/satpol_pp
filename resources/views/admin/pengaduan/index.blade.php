@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row column_title">
  <div class="col-md-12">
     <div class="page_title">
        <h2>Data pengaduan</h2>
     </div>
  </div>
</div>
<div class="white_shd full margin_bottom_30">
  <div class="full graph_head">
     <div class="heading1 margin_0">
       
      <a href="/superadmin/pengaduan/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
     </div>
  </div>
  <div class="table_section padding_infor_info">
     <div class="table-responsive-sm">
        <table class="table table-bordered">
           <thead>
              <tr style="background-color: rgb(52, 52, 51); font-weight:bold;color:aliceblue">
                <th>No</th>
                <th>Tanggal</th>
                <th>Nomor Pengaduan</th>
                <th>Nama Pelapor</th>
                <th>Lokasi</th>
                <th>Petugas</th>
                <th>Jenis Pengaduan</th>
                <th>Isi Pengaduan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
           </thead>
           <tbody>
            
            @foreach ($data as $key => $item)
            <tr>
              <td>{{$data->firstItem() + $key}}</td>
              <td>{{\Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y')}}</td>
              <td>{{$item->nomor}}</td>
              <td>{{$item->pelapor == null ? null : $item->pelapor->nama}}</td>
              <td>{{$item->lokasi == null ? null : $item->lokasi->nama}}</td>
              <td>{{$item->petugas == null ? null : $item->petugas->nama}}</td>
              <td>{{$item->jenis}}</td>
              <td>{{$item->isi}}</td>
              <td>{{$item->keterangan}}</td>
              <td>
                <a href="/superadmin/pengaduan/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                <a href="/superadmin/pengaduan/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
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
