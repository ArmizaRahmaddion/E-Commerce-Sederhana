@extends('layoutadmin.layout')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Halaman Mutasi</h3>
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
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                </div>
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode Pesanan</th>
                                                <th>MK</th>
                                                <th>Barang</th>
                                                <th>Jumlah Pesan</th>
                                                <th>Jumlah Harga</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Tanggal Approved</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mutasi as $m)
                                                <tr>
                                                    <td>{{ $m['kode'] }}</td>
                                                    <td>{{ $m['MK'] }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#detailModal{{ $m['kode'] }}">
                                                            Detail <i class="bi bi-eye"></i>
                                                        </button>
                                                        <div class="modal fade" id="detailModal{{ $m['kode'] }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Detail Pesanan</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Nama Barang</th>
                                                                                    <th>Jumlah Pesan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($m['orders'] as $order)
                                                                                    <tr>
                                                                                        <td>{{ $order->product->nama }}</td>
                                                                                        <td>{{ $order->jumlah_pesan }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $m['total_jumlah_pesan'] }}</td>
                                                    <td>{{ number_format($m['total_jumlah_harga'], 0, ',', '.') }}</td>
                                                    <td>{{ $m['tanggal_pembelian'] }}</td>
                                                    <td>{{ $m['tanggal_approved'] }}</td>
                                                    <td>{{ $m['orders'][0]['keterangan'] }}</td>
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
@endsection
