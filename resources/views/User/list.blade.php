@extends('layoutadmin.layout')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Halaman Kelola User</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-content">
                                <div class="card-body"></div>
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>USERNAME</th>
                                                <th>EMAIL</th>
                                                <th>PASSWORD</th>
                                                <th>PHONE</th>
                                                <th>ADDRESS</th>
                                                <th>ROLE ID</th>
                                                <th>AKSI</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $user->username }}
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td>
                                                        {{ $user->password }}
                                                    </td>
                                                    <td>
                                                        {{ $user->phone }}
                                                    </td>
                                                    <td>
                                                        {{ $user->address }}
                                                    </td>
                                                    <td>
                                                        {{ $user->role_id }}
                                                    </td>
                                                    <td>
                                                        {{--
                                                    <a
                                                        href="{{ url('barang/' . $value->id) }}"
                                                        class="btn btn-success"
                                                        ><i
                                                            class="fas fa-edit"
                                                        ></i>
                                                        Edit</a
                                                    >
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ url('barang/' . $value->id) }}"
                                                        method="post"
                                                    >
                                                        <input
                                                            type="hidden"
                                                            name="_token"
                                                            value="{!! csrf_token() !!}"
                                                        />
                                                        <input
                                                            type="hidden"
                                                            name="id"
                                                            value="{{ $value->id }}"
                                                        />
                                                        {{
                                                        method_field('DELETE')
                                                        }}
                                                        <button
                                                            type="submit"
                                                            onclick="return confirm('Anda Yakin Menghapus?')"
                                                            class="btn btn-danger"
                                                        >
                                                            <i
                                                                class="fas fa-trash-alt"
                                                            ></i>
                                                            Delete
                                                        </button>
                                                        --}}
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
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>
                        Crafted with
                        <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="https://saugi.me">Saugi</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
@endsection
