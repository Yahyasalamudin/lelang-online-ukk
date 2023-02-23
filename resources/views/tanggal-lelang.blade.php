@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Pilih Tanggal</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-inline">
                        <form action="{{ route('cetak.tgl-lelang') }}" target="_blank">
                            <label for="tgl_awal">Tanggal Awal</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
                            </div>
                            <label for="tgl_akhir">Tanggal Akhir</label>
                            <div class="input-group mb-5">
                                <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" required>
                            </div>
                            <div class="input-group mb-3 mx-auto w-25">
                                <button type="submit" class="form-control bg-gradient-info text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        function cetak() {
            var tgl_awal = document.getElementById('tgl_awal').value
            var tgl_akhir = document.getElementById('tgl_akhir').value;
            if (tgl_awal != "" && tgl_akhir != "") {
                window.location = ('/cetak/lelang/' + tgl_awal + '/' + tgl_akhir);
            }
        }
    </script> --}}
@endsection
