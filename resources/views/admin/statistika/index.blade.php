@extends('layouts/admin')
@section('content')
<div class="main-content">
      <section class="section">
            <div class="section-header">
                  <h1>Dashboard / Statistika</h1>
            </div>
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">KEMBALI</a>
            <br>
            <br>
            <div class="row">
                  <div class="col-lg-6 col-md-7 col-sm-7 col-15">
                        <a href="{{ url('/admin/statistika/materi') }}">
                              <div class="card card-statistic-1">
                                    <div class="card-icon bg-success">
                                          <i class="fas fa-infinity text-white" style="font-size: 2rem;"></i>
                                    </div>
                                    <div class="card-wrap">
                                          <div class="card-header">
                                                <h3>KELOLA MATERI</h3>
                                          </div>
                                    </div>
                              </div>
                        </a>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-15">
                        <a href="{{ url('/admin/statistika/soal') }}">
                              <div class="card card-statistic-1">
                                    <div class="card-icon bg-info">
                                          <i class="fas fa-calculator text-white" style="font-size: 2rem;"></i>
                                    </div>
                                    <div class="card-wrap">
                                          <div class="card-header">
                                                <h3>KELOLA SOAL</h3>
                                          </div>
                                    </div>
                              </div>
                        </a>
                  </div>
            </div>
    </section>
</div>
@endsection