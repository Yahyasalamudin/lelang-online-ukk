@extends('layouts.navbar')
@section('link')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Admin
                                    @if (auth()->user()->role == 'admin')
                                        <a href="{{ route('admin.create') }}"><i class="fa-solid fa-plus"></i></a>
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
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Password</th>
                                        <th
                                            class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <?php $no = 1; ?>
                                <tbody id="data-admin">
                                    @foreach ($admins as $a)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-3">
                                                    <div class="align-middle text-center text-sm">
                                                        <h6 class="mb-0 text-sm"> {{ $no++ }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $a->nama }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $a->no_hp }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $a->username }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $a->deskripsi }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('admin.edit', $a->id) }}"
                                                    class="btn btn-link text-dark px-3 mb-0"><i
                                                        class="fas fa-pencil-alt text-dark me-2"
                                                        aria-hidden="true"></i>Edit</a>
                                                <form action="{{ route('admin.destroy', $a->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-link delete-confirm text-danger text-gradient px-3 mb-0"><i
                                                            class="far fa-trash-alt me-2"></i>Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
