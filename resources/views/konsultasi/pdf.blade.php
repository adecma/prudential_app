<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-head{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-center{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-left{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
        
        dl {
            padding-left: 2em;
        }
        dt {
            font-weight: bold;
            text-decoration: underline;
        }
        dd {
            margin: 0;
            padding: 0 0 0.5em 0;
        }
        
    </style>

    <style>
        .page-break {
            page-break-after: always;
        }
        
        .header,
        .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }
        .header {
            top: 0px;
        }
        .footer {
            bottom: 0px;
        }
        .pagenum:before {
            content: counter(page);
        }

        ul, h5 {
            font-family:Arial;
            font-size:10px;
        }
    </style>
</head>
<body>
    <div style="font-family:Arial; font-size:12px;">
        <center><h3>Hasil Rekomendasi Produk</h3></center>
    </div>
    
    <h4>Data User</h4>
    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head">Identitas</th>
                <th class="tg-head">Kriteria</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <dl>
                        <dt>Nama</dt>
                        <dd>{{ $riwayat->nama }}</dd>
                        <dt>Alamat</dt>
                        <dd>{{ $riwayat->alamat }}</dd>
                        <dt>Kontak</dt>
                        <dd>{{ $riwayat->kontak }}</dd>
                        <dt>Rekomendasi</dt>
                        <dd>{{ $riwayat->limit }}</dd>
                        <dt>Tanggal</dt>
                        <dd>{{ $riwayat->created_at->format('d F Y, H:i:s') }}</dd>
                    </dl>
                </td>

                <td>
                    <dl>
                        @php
                            $kriteriaUser = json_decode($riwayat->kriteria);
                        @endphp

                        @foreach($kriteriaUser as $kriteria)
                            <dt>{{ $kriteria->kriteria }}</dt>
                            <dd>
                                {{ number_format($kriteria->nilai) }}
                            </dd>
                        @endforeach
                    </dl>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

    <h4>Rekomendasi</h4>

    @php
        $no = 1;
    @endphp

    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head">Rank</th>
                <th class="tg-head">Produk</th>
                <th class="tg-head">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach(json_decode($riwayat->hasil) as $data)             
                <tr>
                    <td class="tg-center">{{ $no++ }}</td>
                    <td class="tg-left">{{ $data->produk_title }}</td>
                    <td class="tg-center">{{ $data->hasil }}</td>
                </tr>                       
            @endforeach
        </tbody>
    </table>



    <div class="page-break"></div>

    <h4>Lampiran Detail Produk</h4>

    <ul>
        @php
            $hasil = collect((array) json_decode($riwayat->hasil))
                ->values()
                ->pluck('produk_id');
            $x = 0
        @endphp
        
        @for($i = 0; $i < count($hasil); $i++) 
            @foreach($produks as $produk)
                @if($hasil[$i] == $produk->id)
                    <li>
                        <strong>{{ $produk->title }}</strong> ({{ $produk->id }} - {{ $hasil[$x++] }}) <br>
                        {{ $produk->keterangan }} <br>

                        @if($produk->kondisis->count())
                            <h5>Pertanggungan Kondisi Kritis {{ $produk->kondisis->count() }}</h5>

                            @php
                                $no = 1
                            @endphp

                            <table class="tg">
                                <thead>
                                    <tr>
                                        <th class="tg-head">No</th>
                                        <th class="tg-head">Kondisi</th>
                                        <th class="tg-head">Stadium A</th>
                                        <th class="tg-head">Stadium B</th>
                                        <th class="tg-head">Stadium C</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produk->kondisis as $kondisi)
                                        <tr>
                                            <td class="tg-center">{{ $no++ }}</td>
                                            <td class="tg-left">{{ $kondisi->title }}</td>
                                            <td class="tg-center">{{ $kondisi->stadium_a }}</td>
                                            <td class="tg-center">{{ $kondisi->stadium_b }}</td>
                                            <td class="tg-center">{{ $kondisi->stadium_c }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <br><br>
                        @else
                            <br>
                        @endif
                    </li>
                @endif
            @endforeach
        @endfor
    </ul>
</body>
</html>