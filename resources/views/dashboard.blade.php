@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="mb-4 ms-3">
            <div class="row justify-content-start fs-6 badge bg-gradient-info d-inline">
                Selamat {{ $timeOfDay }},<span>{{ auth()->user()->nama }}</span>
            </div>
        </div>
        @if (auth()->user()->role == 'admin')
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Admin</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $count1 }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="/admin">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Petugas</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $count2 }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="/petugas">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pengguna</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $count3 }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="/pengguna">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Lelang</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $lelang }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="/lelang">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Lelang</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No.
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                            Gambar</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Nama Barang</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Tanggal Lelang</th>
                                    </tr>
                                </thead>
                                <?php $no = 1; ?>
                                @foreach ($lelang1 as $l)
                                    @if ($l->status == 'dibuka')
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-5">
                                                        <div class="align-middle text-center text-sm">
                                                            <h6 class="mb-0 text-sm"> {{ $no++ }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="avatar-group mt-2">
                                                        <img src="{{ url('storage/image/barang/' . $l->barang->gambar) }}"
                                                            alt="" style="height:100px; width:100px">
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> {{ $l->barang->nama_barang }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">Dibuka</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ date('d/m/Y', strtotime($l->tgl_lelang)) }} </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
