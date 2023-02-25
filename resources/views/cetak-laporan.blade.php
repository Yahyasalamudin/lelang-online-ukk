@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Cetak Laporan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-inline">
                        <div class="input-group mb-3 mx-auto w-50 row justify-content-center">
                            <a href="{{ route('cetak-admin') }}" class="btn btn-info" target="_blank">Cetak data admin</a>
                        </div>
                        <div class="input-group mb-3 mx-auto w-50 row justify-content-center">
                            <a href="{{ route('cetak-petugas') }}" class="btn btn-info" target="_blank">Cetak data
                                Petugas</a>
                        </div>
                        <div class="input-group mb-3 mx-auto w-50 row justify-content-center">
                            <a href="{{ route('cetak-pengguna') }}" class="btn btn-info" target="_blank">Cetak data User</a>
                        </div>
                        <div class="input-group mb-3 mx-auto w-50 row justify-content-center">
                            <a href="{{ route('cetak-lelang') }}" class="btn btn-info">Cetak data lelang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
