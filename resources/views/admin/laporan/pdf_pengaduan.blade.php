<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>

    <table width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/hsu.png'))) }}" width="80px"> &nbsp;&nbsp;
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/satpol.png'))) }}" width="67px">&nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="60%">
                PEMERINTAH KABUPATEN HULU SUNGAI UTARA<BR/>
                KANTOR SATUAN POLISI PRAMONG PRAJA<br/>
                Jl Bihman Villa No.16 Sungai Karias Kec. Amuntai Tengah, Kabupaten Hulu Sungai Utara<br/>
                Kalimantan Selatan 71416
            </td>
            <td width="15%">
            </td>
            
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA PELANGGARAN PERATURAN DAERAH </h3> 
    <center>PERIODE : {{\Carbon\Carbon::createFromFormat('m', $bulan)->translatedFormat('F')}} {{$tahun}}</center>
    <br/>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nomor</th>
            <th>Pelapor</th>
            <th>Lokasi</th>
            <th>Petugas</th>
            <th>Jenis</th>
            <th>Isi</th>
            <th>Keterangan</th>
        </tr>
        @php
            $no =1;
        @endphp
        
        @foreach ($data as $key => $item)
        <tr>
          <td>{{$key + 1}}</td>
          <td>{{$item->nomor}}</td>
          <td>{{$item->pelapor == null ? null : $item->pelapor->nama}}</td>
          <td>{{$item->lokasi == null ? null : $item->lokasi->nama}}</td>
          <td>{{$item->petugas == null ? null : $item->petugas->nama}}</td>
          <td>{{$item->jenis}}</td>
          <td>{{$item->isi}}</td>
          <td>{{$item->keterangan}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br/>Amuntai, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br/>
            SATPOL PP KAB. HSU<br/>
            Kepala <br/><br/><br/><br/>

            <u>Asikin Noor SSTP, MAP</u><br/>
            NIP. 1956245502024551
            </td>
        </tr>
    </table>
</body>
</html>