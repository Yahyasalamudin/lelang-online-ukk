@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                <div class="card mt-5">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div>
                                <h6 class="text-center mb-3">Lelang Barang</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('lelang.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <label for="barang">Nama Barang</label>
                            <div class="mb-3">
                                <select class="form-control" name="id_barang" id="barang" required>
                                    <option value="">Pilih Barang</option>
                                    @foreach ($databarang as $db)
                                        <option value="{{ $db->id_barang }}"> {{ $db->nama_barang }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="tgl_akhir">Tanggal Akhir Lelang</label>
                            <div class="mb-3">
                                <input class="form-control" type="datetime-local" name="tgl_akhir" id="tgl_akhir" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-25 mt-4 mb-0">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
