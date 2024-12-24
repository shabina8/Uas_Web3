@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Data Peminjam</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Peminjam</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total : {{$total_peminjam}} Peminjam</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="pegawai">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Peminjam</th>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjam as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->anggota->name }}</td>
                                        <td>{{ $item->buku->title }}</td>
                                        <td>{{ $item->borrowed_at }}</td>
                                        <td>{{ $item->due_date }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('data-penulis.edit', $item->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                        
                                            <!-- Tombol Hapus -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        
                                            <!-- Modal Konfirmasi Hapus -->
                                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{ route('data-peminjam.destroy', $item->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                             <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('data-peminjam.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <!-- Dropdown Anggota -->
                                                <div class="mb-3">
                                                    <label for="anggota_id_{{ $item->id }}" class="form-label">Anggota</label>
                                                    <select name="anggota_id" id="anggota_id_{{ $item->id }}" class="form-select" required>
                                                        <option value="">Pilih Anggota</option>
                                                        @foreach($anggota as $kat)
                                                            <option value="{{ $kat->id }}" {{ $item->anggota_id == $kat->id ? 'selected' : '' }}>
                                                                {{ $kat->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Dropdown Buku -->
                                                <div class="mb-3">
                                                    <label for="buku_id_{{ $item->id }}" class="form-label">Buku</label>
                                                    <select name="buku_id" id="buku_id_{{ $item->id }}" class="form-select" required>
                                                        <option value="">Pilih Buku</option>
                                                        @foreach ($buku as $book)
                                                            <option value="{{ $book->id }}" {{ $item->buku_id == $book->id ? 'selected' : '' }}>
                                                                {{ $book->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Input Tanggal Peminjaman -->
                                                <div class="mb-3">
                                                    <label for="borrowed_at_{{ $item->id }}" class="form-label">Tanggal Peminjaman</label>
                                                    <input 
                                                        type="date" 
                                                        name="borrowed_at" 
                                                        id="borrowed_at_{{ $item->id }}" 
                                                        class="form-control" 
                                                        value="{{ $item->borrowed_at }}" 
                                                        required>
                                                </div>
                                                <!-- Input Tanggal Pengembalian -->
                                                <div class="mb-3">
                                                    <label for="due_date_{{ $item->id }}" class="form-label">Tanggal Pengembalian</label>
                                                    <input 
                                                        type="date" 
                                                        name="due_date" 
                                                        id="due_date_{{ $item->id }}" 
                                                        class="form-control" 
                                                        value="{{ $item->due_date }}" 
                                                        required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-peminjam.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="anggota_id" class="form-label">Anggota</label>
                            <select name="anggota_id" id="anggota_id" class="form-select" required>
                                <option value="">Pilih Anggota</option>
                                @foreach($anggota as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="buku_id" class="form-label">Buku</label>
                            <select name="buku_id" class="form-select" required>
                                <option value="">Pilih Buku</option>
                                @foreach ($buku as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="borrowed_at">Tanggal Peminjaman</label>
                            <input type="date" name="borrowed_at" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="due_date">Tanggal Pengembalian</label>
                            <input type="date" name="due_date" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
