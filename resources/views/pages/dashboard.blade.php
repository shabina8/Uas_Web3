@extends('layouts.main')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">

        <div class="row">

         <!-- Karyawan -->
  <div class="col">
    <div class="card info-card bg-primary text-white rounded-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Karyawan</h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle bg-white text-primary d-flex align-items-center justify-content-center">
            <i class="bi bi-person"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $total_karyawan }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Member -->
  <div class="col">
    <div class="card info-card bg-success text-white rounded-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Member</h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle bg-white text-success d-flex align-items-center justify-content-center">
            <i class="bi bi-people-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $total_member }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Kategori -->
  <div class="col">
    <div class="card info-card bg-warning text-dark rounded-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Kategori</h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle bg-white text-warning d-flex align-items-center justify-content-center">
            <i class="bi bi-tags-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $total_Kategori }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Penulis -->
  <div class="col">
    <div class="card info-card bg-info text-white rounded-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Penulis</h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle bg-white text-info d-flex align-items-center justify-content-center">
            <i class="bi bi-pen-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $total_penulis }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Buku -->
  <div class="col">
    <div class="card info-card bg-danger text-white rounded-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Buku</h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle bg-white text-danger d-flex align-items-center justify-content-center">
            <i class="bi bi-book"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $total_buku }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Peminjam -->
  <div class="col">
    <div class="card info-card bg-secondary text-white rounded-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Peminjam</h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle bg-white text-secondary d-flex align-items-center justify-content-center">
            <i class="bi bi-file-text-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $total_peminjam }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

        </div>
          
    </section>

@endsection
