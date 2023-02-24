@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Detail Lelang
                            @if (auth()->user()->role == 'admin' && $detail->status == 'ditutup')
                                <a href="{{ Route('report', $detail->id_lelang) }}" target="_blank"><i
                                        class="fa-solid fa-file-export"></i></a>
                            @endif
                            @if (auth()->user()->role == 'petugas' && $detail->status == 'ditutup')
                                <a href="{{ Route('report', $detail->id_lelang) }}" target="_blank"><i
                                        class="fa-solid fa-file-export"></i></a>
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <h5 class="font-weight-bolder">Nama Barang: <p class="mb-5">{{ $detail->nama_barang }}</p>
                            </h5>
                            <h5 class="font-weight-bolder">Harga Awal: <p class="mb-5">
                                    Rp.{{ number_format($detail->harga_awal) }}</p>
                            </h5>
                            @if ($detail->harga_akhir == null)
                                <h5 class="font-weight-bolder">Harga Akhir: <p class="mb-5">-</p>
                                </h5>
                            @else
                                <h5 class="font-weight-bolder">Harga Akhir: <p class="mb-5">
                                        Rp.{{ number_format($detail->harga_akhir) }}</p>
                                </h5>
                            @endif

                            <h5 class="font-weight-bolder">Tanggal Lelang: <p class="mb-5">
                                    {{ date('d, F Y', strtotime($detail->tgl_lelang)) }}</p>
                            </h5>

                            @if ($detail->id_pengguna == null)
                                <h5 class="font-weight-bolder">Pemenang: <p class="mb-5">-</p>
                                </h5>
                            @else
                                <h5 class="font-weight-bolder">Pemenang: <p class="mb-5">{{ $detail->nama }} </p>
                                </h5>
                            @endif
                            <h5 class="font-weight-bolder">Deskripsi: <p class="mb-5">{{ $detail->deskripsi_barang }}</p>
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                        <div class="position-relative d-flex align-items-center justify-content-center h-100 me-4">
                            <img class="w-100 position-relative z-index-2 pt-1 border-radius-lg"
                                src="{{ url('storage/image/barang/' . $detail->gambar) }}" alt="rocket">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role == 'pengguna' && $detail->status == 'dibuka')
            <div class="row my-4">
                <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <h6>Penawaran Harga</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="table-responsive">
                                <form role="form" action="{{ route('penawaran', $detail->id_barang) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="id_lelang"
                                            placeholder="Penawaran Harga" value=" {{ $detail->id_lelang }} " hidden>
                                    </div>
                                    <div class="px-3 mb-3">
                                        <input type="number" class="form-control" name="penawaran_harga"
                                            placeholder="Penawaran Harga">
                                    </div>
                                    @if (session('warning'))
                                        <div class="px-3">
                                            <div class="alert alert-warning">
                                                {{ session('warning') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-center px-3 mb-3">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0"
                                            onclick="return confirm('Apakah anda yakin?')">Tawar</button>
                                    </div>
                                </form>
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
                                <h6>List User</h6>
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
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor HP</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Penawaran</th>
                                        @if (auth()->user()->role == 'petugas')
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                        @endif
                                        @if (auth()->user()->role == 'pengguna' && $detail->status == 'ditutup')
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                        @endif
                                    </tr>
                                </thead>
                                <?php $no = 1; ?>
                                @foreach ($history as $ud)
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-5">
                                                    <div class="align-middle text-center text-sm">
                                                        <h6 class="mb-0 text-sm"> {{ $no++ }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $ud->nama }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $ud->no_hp }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    Rp.{{ number_format($ud->penawaran_harga) }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if (auth()->user()->role == 'petugas')
                                                    <form action="{{ url('pemenang', $ud->id_history) }}" method="post">
                                                        @csrf
                                                        @if ($detail->status == 'dibuka')
                                                            <button type="submit" class="btn btn-icon btn-primary"
                                                                onclick="return confirm('Are you sure?')">Pilih</button>
                                                        @else
                                                            @if ($ud->status_pemenang == 'kalah')
                                                                <span class="btn btn-icon btn-danger">Kalah</span>
                                                            @else
                                                                <span class="btn btn-icon btn-success">Menang</span>
                                                            @endif
                                                        @endif
                                                    </form>
                                                @endif
                                                @if (auth()->user()->role == 'pengguna' && $detail->status == 'ditutup')
                                                    @if ($ud->status_pemenang == 'kalah')
                                                        <span class="btn btn-icon btn-danger">Kalah</span>
                                                    @else
                                                        <span class="btn btn-icon btn-success">Menang</span>
                                                    @endif
                                                @endif
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
    <p id="demo"></p>
    @if ($detail->status == 'dibuka')
        @foreach ($history as $ud)
            <form action="{{ Route('pemenang', $ud->id_history) }}" method="post">
                @csrf
                <button type="submit" id="pilih"
                    style="border-left-width: 0px;
            border-top-width: 0px;
            border-right-width: 0px;
            border-bottom-width: 0px;"></button>
            </form>
        @endforeach
    @endif

    <input type="hidden" id="tgl_akhir" value="{{ $detail->tgl_akhir }}">

    <script>
        var now = new Date();
        var timeNow = now.getTime();

        var akhir = document.getElementById('tgl_akhir').value
        var tgl_akhir = new Date(akhir);
        var timeEnd = tgl_akhir.getTime();

        // console.log(timeNow);
        // console.log(timeEnd);

        if (timeNow > timeEnd) {
            var button = document.getElementById("pilih");
            // button.preventDefault();
            button.click();
            // alert('test');
        }
    </script>
@endsection
