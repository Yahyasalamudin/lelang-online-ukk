@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h5>
                            <a href="{{ Route('cetak-pemenang', $detail->id_lelang) }}" target="_blank" class="ms-2 fs-4">Bukti
                                Pemenang<i class="fa-solid fa-file-export ms-2"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 ms-3">
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
    </div>
@endsection
