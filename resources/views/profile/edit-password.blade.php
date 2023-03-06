@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-10 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Edit Password</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('updatepassword', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <label>Password Lama</label>
                            <div class="mb-3">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" placeholder="Masukkan Password Lama" autofocus>

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label>Password Baru</label>
                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password Baru">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label>Konfirmasi Password</label>
                            <div class="mb-3">
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                    name="confirm_password" placeholder="Konfirmasi Password Baru">

                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn me-5 bg-gradient-info mt-4 mb-0">Simpan Perubahan</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
