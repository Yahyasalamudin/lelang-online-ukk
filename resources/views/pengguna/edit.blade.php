@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Edit Pengguna</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('pengguna.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <label>Nama</label>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Nama Lengkap" value="{{ old('nama', $user->nama) }}">

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label>Username</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username"
                                    value="{{ old('username', $user->username) }}" disabled>
                            </div>
                            <label>Password</label>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="password" value="{{ old('password', $user->deskripsi) }}">

                                @error('password')
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
                            <label for="role">Role</label>
                            <div class="mb-3">
                                <select class="form-control" name="role" id="role">
                                    <option value="pengguna">{{ $user->role }}</option>
                                    <option value="admin">admin</option>
                                    <option value="petugas">petugas</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
