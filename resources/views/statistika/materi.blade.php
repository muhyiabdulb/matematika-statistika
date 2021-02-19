@extends('layouts/siswa')
@section('content')
<div class="main-content">
      <section class="section">
            <div class="section-header">
                  <h1>Home / Belajar Statistika</h1>
            </div>

            <a href="{{ url('/siswa') }}" class="btn btn-primary">KEMBALI</a>
            <br>
            <br>

            <h2 style="text-align: center;">Materi Statistika</h2>
            <div class="section-header">
                  <table width="100%">
                        @foreach($materis as $materi)
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <td>{!! $materi->sub_materi !!}</td>
                              </tr>
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <th></th>
                              </tr>
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <th>
                                          <a href="{{ url('/siswa/statistika/soal') }}" class="btn btn-primary">LATIHAN SOAL</a>
                                    </th>
                              </tr>
                        @endforeach
                  </table>
            </div>
    </section>
</div>
@endsection