@extends('layouts/siswa')
@section('content')
<div class="main-content">
      <section class="section">
            <div class="section-header">
                  <h1>Home / Belajar Statistika / Latihan Soal</h1>
            </div>

            <a href="{{ url('/siswa/statistika') }}" class="btn btn-primary">KEMBALI</a>
            <br>
            <br>

            <h3>Latihan Soal Statistika</h3>
            <div class="section-header">
                  <form action="#" method="post">
                        <table width="100%">
                              @php
                              $no = 1;
                              @endphp
                              @foreach($soals as $soal)
                                    <tr>
                                          <th>NOMOR : {{ $no++ }} </th>
                                    </tr>
                                    <tr>
                                          <th height="21">{!! $soal->soal !!}</th>
                                    </tr>
                                    <tr>
                                          <th>A. <input type="radio" value="A"> {{ $soal->pilihan_a }}</th>
                                    </tr>
                                    <tr>
                                          <th>B. <input type="radio" value="B"> {{ $soal->pilihan_b }}</th>
                                    </tr>
                                    <tr>
                                          <th>C. <input type="radio" value="C"> {{ $soal->pilihan_c }}</th>
                                    </tr>
                                    <tr>
                                          <th>D. <input type="radio" value="D"> {{ $soal->pilihan_d }}</th>
                                    </tr>
                                    <tr>
                                          <th>E. <input type="radio" value="E"> {{ $soal->pilihan_e }}</th>
                                    </tr>
                              @endforeach
                                    
                                    <br>
                                    <br>
                                    <tr>
                                          <th>
                                                <a href="#" class="btn btn-primary">SELESAI</a>
                                          </th>
                                    </tr>
                        </table>
                  </form>
            </div>
   </section>
</div>
@endsection