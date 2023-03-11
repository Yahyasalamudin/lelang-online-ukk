@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Pengguna
                                    @if (auth()->user()->role == 'admin')
                                        <a href="{{ route('pengguna.create') }}"><i class="fa-solid fa-plus"></i></a>
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
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Nomor HP</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Username</th>
                                        @if (auth()->user()->role == 'admin')
                                            <th
                                                class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                                Password</th>
                                            <th
                                                class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <?php $no = 1; ?>
                                @foreach ($pengguna as $p)
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
                                                <span class="text-xs font-weight-bold"> {{ $p->nama }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $p->no_hp }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $p->username }} </span>
                                            </td>
                                            @if (auth()->user()->role == 'admin')
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> {{ $p->deskripsi }} </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <a href="{{ route('pengguna.edit', $p->id) }}"
                                                        class="btn btn-link text-dark px-3 mb-0"><i
                                                            class="fas fa-pencil-alt text-dark me-2"
                                                            aria-hidden="true"></i>Edit</a>
                                                    <form action="{{ route('pengguna.destroy', $p->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" id="delete"
                                                            class="btn btn-link delete-confirm text-danger text-gradient px-3 mb-0"><i
                                                                class="far fa-trash-alt me-2"></i>Hapus</button>
                                                    </form>
                                                </td>
                                            @endif
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
