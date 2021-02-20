@extends('layouts/admin')
@section('content')
<div class="main-content">
      <section class="section">
            <div class="section-header">
                  <h1>Dashboard / Statistika / Soal Latihan</h1>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            @endif

            <a href="{{ url('/admin/statistika') }}" class="btn btn-primary">KEMBALI</a>
            <a href="{{ route('admin.statistika.soal.create') }}" class="btn btn-success">TAMBAH SOAL</a>
            <br>
            <br>

            <h3>Latihan Soal Statistika</h3>
            <div class="section-header">
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
                                    <!-- <th height="21"><font color="#000000">&nbsp;</font></td> -->
                                    <th>A. {{ $soal->pilihan_a }}</th>
                              </tr>
                              <tr>
                                    <!-- <th height="21"><font color="#000000">&nbsp;</font></td> -->
                                    <th>B. {{ $soal->pilihan_b }}</th>
                              </tr>
                              <tr>
                                    <!-- <th height="21"><font color="#000000">&nbsp;</font></td> -->
                                    <th>C. {{ $soal->pilihan_c }}</th>
                              </tr>
                              <tr>
                                    <!-- <th height="21"><font color="#000000">&nbsp;</font></td> -->
                                    <th>D. {{ $soal->pilihan_d }}</th>
                              </tr>
                              <tr>
                                    <!-- <th height="21"><font color="#000000">&nbsp;</font></td> -->
                                    <th>E. {{ $soal->pilihan_e }}</th>
                              </tr>
                              <tr>
                                    <!-- <th height="21"><font color="#000000">&nbsp;</font></td> -->
                                    <th>Jawaban benar : {{ $soal->jawaban_benar }}</th>
                              </tr>
                              <tr>
                                    <!-- <th height="21"><font color="#000000">&nbsp;</font></td> -->
                                    <th>
                                          <form action="{{ route('admin.statistika.soal.delete', $soal->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">HAPUS</button>
                                          </form>
                                    </th>
                                    <th>
                                          <a href="{{ route('admin.statistika.soal.edit', $soal->id) }}" class="btn btn-warning">EDIT</a>
                                    </th>
                              </tr>
                        @endforeach
                  </table>
            </div>
    </section>
</div>
@endsection