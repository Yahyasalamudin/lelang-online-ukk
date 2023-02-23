@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Edit Barang</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('barang.update', $barangs->id_barang) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label>Nama Barang</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"
                                    value="{{ $barangs->nama_barang }}">
                            </div>
                            <label>Gambar</label>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="gambar" placeholder="Gambar"
                                    value="{{ $barangs->gambar }}">
                            </div>
                            <label>Harga Awal</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="harga_awal" placeholder="Harga Awal"
                                    value="{{ $barangs->harga_awal }}">
                            </div>
                            <label>Deskripsi</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="deskripsi_barang" placeholder="Deskripsi"
                                    value="{{ $barangs->deskripsi_barang }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
