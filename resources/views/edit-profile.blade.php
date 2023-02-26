@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-10 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Edit Profile</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('updateprofile', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <label>Nama</label>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Nama Lengkap" value="{{ old('nama', $user->nama) }}"
                                    autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label>Username</label>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" placeholder="Username" value="{{ old('username', $user->username) }}">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label>Nomer Hp</label>
                            <div class="mb-3">
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                    name="no_hp" placeholder="Nomor HP" aria-label="Name"
                                    value="{{ old('no_hp', $user->no_hp) }}">

                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn me-5 bg-gradient-info mt-4 mb-0">Simpan Perubahan</button>
                                <a href="{{ route('editpassword', $user->id) }}" class="btn bg-gradient-info mt-4 mb-0">Edit
                                    Password</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
