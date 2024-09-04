{{-- @extends('layoutadmin.layout')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Halaman RESTOK BARANG</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="" class="btn btn-success">Export to Excel</a>
                                <a href="" class="btn btn-info">Export to CSV</a>
                                <a href="" class="btn btn-danger">Export to PDF</a>
                                <div class="container mt-5">
                                    <a href="{{ url('/restok/create') }}" class="btn btn-primary">Tambah
                                        Barang</a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                </div>
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Barang</th>
                                                <th>Pemasok</th>
                                                <th>Jumlah</th>
                                                <th>Harga Beli Akhir</th>
                                                <th>Tanggal</th>
                                                <th>Kode Pesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($restoks as $restok)
                                                <tr>
                                                    <td>{{ $restok->id_restock }}</td>
                                                    <td>{{ $restok->produk->nama }}</td>
                                                    <td>{{ $restok->pemasok->nama }}</td>
                                                    <td>{{ $restok->jumlah }}</td>
                                                    <td>{{ $restok->produk->harga_beli_akhir }}</td>
                                                    <td>{{ $restok->tanggal }}</td>
                                                    <td>{{ $restok->kode_pesanan }}</td>
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
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="https://saugi.me">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection --}}
