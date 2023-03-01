@extends('layouts.navbar')
@section('link')
    <style>
        table {
            width: 100%;
            table-layout: fixed;
        }

        td {
            width: 100px;
            overflow: auto;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Barang <a href="{{ route('barang.create') }}"><i class="fa-solid fa-plus"></i></a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 col-12">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No.
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Nama Barang</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Gambar</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Tanggal Daftar</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Harga Awal</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <?php $no = 1; ?>
                                @foreach ($barangs as $b)
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-3">
                                                    <div class="align-middle text-center text-sm">
                                                        <h6 class="mb-0 text-sm"> {{ $no++ }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $b->nama_barang }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <div class="avatar-group mt-2">
                                                    <img src="{{ url('storage/image/barang/' . $b->gambar) }}"
                                                        alt="" style="height:100px; width:100px">
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($b->tgl_daftar)) }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    Rp.{{ number_format($b->harga_awal) }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    {{ $b->deskripsi_barang }} </span>
                                            </td>
                                            @if ($b->status_barang == 'dilelang')
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-secondary">Dilelang</span>
                                                </td>
                                            @else
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">Belum Dilelang</span>
                                                </td>
                                            @endif
                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('barang.edit', $b->id_barang) }}"
                                                    class="btn btn-link text-dark px-3 mb-0"><i
                                                        class="fas fa-pencil-alt text-dark me-2"
                                                        aria-hidden="true"></i>Edit</a>
                                                <form action=" {{ route('barang.destroy', $b->id_barang) }} "
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-link delete-confirm text-danger text-gradient px-3 mb-0"><i
                                                            class="far fa-trash-alt me-2"></i>Hapus</button>
                                                </form>
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
