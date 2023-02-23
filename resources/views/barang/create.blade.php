@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Tambah Barang</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('barang.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <label>Nama Barang</label>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('nama_barang')is-invalid @enderror"
                                    name="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}">

                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label>Gambar</label>
                            <div class="mb-3">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar" placeholder="Gambar">

                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label>Harga Awal</label>
                            <div class="mb-3">
                                <input type="number" class="form-control @error('harga_awal') is-invalid @enderror"
                                    name="harga_awal" placeholder="Harga Awal" value="{{ old('harga_awal') }}">

                                @error('harga_awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label>Deskripsi</label>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('deskripsi_barang') is-invalid @enderror"
                                    name="deskripsi_barang" placeholder="Deskripsi" value="{{ old('deskripsi_barang') }}">

                                @error('deskripsi_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
