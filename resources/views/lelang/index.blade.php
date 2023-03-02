@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Lelang
                                    @if (auth()->user()->role == 'petugas')
                                        <a href="{{ route('lelang.create') }}"><i class="fa-solid fa-plus"></i></a>
                                    @endif
                                </h6>
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
                                            Harga Awal</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Tanggal Lelang</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                @if (auth()->user()->role != 'pengguna')
                                    <?php $no = 1; ?>
                                    @foreach ($lelangs as $le)
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
                                                        <img src="{{ url('storage/image/barang/' . $le->barang->gambar) }}"
                                                            alt="" style="height:100px; width:100px">
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> {{ $le->barang->nama_barang }}
                                                    </span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">
                                                        Rp.{{ number_format($le->barang->harga_awal) }} </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ date('d/m/Y', strtotime($le->tgl_lelang)) }} </span>
                                                </td>
                                                @if ($le->status == 'dibuka')
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-sm bg-gradient-success">Dibuka</span>
                                                    </td>
                                                @else
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-sm bg-gradient-secondary">Ditutup</span>
                                                    </td>
                                                @endif
                                                <td class="align-middle text-center text-sm">
                                                    <a href="{{ route('lelang.show', $le->id_lelang) }}"
                                                        class="btn btn-link text-dark px-3 mb-0"><i class="fas fa-info"></i>
                                                        Info
                                                    </a>
                                                    @if (auth()->user()->role == 'petugas')
                                                        <form action="{{ route('lelang.destroy', $le->id_lelang) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-link delete-confirm text-danger text-gradient px-3 mb-0"><i
                                                                    class="far fa-trash-alt me-2"></i>Hapus</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                                @if (auth()->user()->role == 'pengguna')
                                    <?php $no = 1; ?>
                                    @foreach ($lelangs as $le)
                                        @if ($le->status == 'dibuka')
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
                                                            <img src="{{ url('storage/image/barang/' . $le->barang->gambar) }}"
                                                                alt="" style="height:100px; width:100px">
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold">
                                                            {{ $le->barang->nama_barang }}
                                                        </span>
                                                    </td>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold">
                                                            Rp.{{ number_format($le->barang->harga_awal) }} </span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold">
                                                            {{ date('d/m/Y', strtotime($le->tgl_lelang)) }} </span>
                                                    </td>
                                                    @if ($le->status == 'dibuka')
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">Dibuka</span>
                                                        </td>
                                                    @else
                                                        <td class="align-middle text-center text-sm">
                                                            <span
                                                                class="badge badge-sm bg-gradient-secondary">Ditutup</span>
                                                        </td>
                                                    @endif
                                                    <td class="align-middle text-center text-sm">
                                                        <a href="{{ route('lelang.show', $le->id_lelang) }}"
                                                            class="btn btn-link text-dark px-3 mb-0"><i
                                                                class="fas fa-info"></i>
                                                            Info
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
