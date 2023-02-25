@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Lelang Dimenangkan
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Gambar</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Barang</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga Final</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Lelang</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pemenang</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <?php $no = 1; ?>
                                @foreach ($lelang as $le)
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
                                                    <img src="{{ url('storage/image/barang/' . $le->gambar) }}"
                                                        alt="" style="height:100px; width:100px">
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    {{ $le->nama_barang }}
                                                </span>
                                            </td>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    Rp.{{ number_format($le->harga_akhir) }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($le->tgl_lelang)) }} </span>
                                            </td>
                                            <td class="text-capitalize align-middle text-center text-dark text-sm">
                                                <span class="text-xs ">
                                                    <b>{{ $le->nama }}</b> </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('winner-detail', $le->id_lelang) }}"
                                                    class="btn
                                                    btn-link text-dark px-3 mb-0"><i
                                                        class="fas fa-info"></i>
                                                    Info
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
