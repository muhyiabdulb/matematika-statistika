@extends('layouts/admin')
@section('content')
<div class="main-content">
      <section class="section">
            <div class="section-header">
                  <h1>Dashboard / Statistika / Materi Statistika</h1>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            @endif

            <a href="{{ url('/admin/dashboard/index') }}" class="btn btn-primary">KEMBALI</a>
            <a href="{{ route('admin.statistika.materi.create') }}" class="btn btn-success">TAMBAH MATERI</a>
            <br>
            <br>
            <h3>Materi Statistika</h3>
            <div class="section-header">
                  <table width="100%">
                        @foreach($materis as $materi)
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <th>{{ $materi->materi }}</th>
                              </tr>
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <td>{!! $materi->sub_materi !!}</td>
                              </tr>
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <th>
                                          <form action="{{ route('admin.statistika.materi.delete', $materi->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                          </form>
                                    </th>
                                    <th>
                                          <a href="{{ route('admin.statistika.materi.edit', $materi->id) }}" class="btn btn-warning">Edit</a>
                                    </th>
                              </tr>
                        @endforeach
                  </table>
            </div>
    </section>
</div>
@endsection