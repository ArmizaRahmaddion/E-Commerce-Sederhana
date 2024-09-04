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
                                <a href="#" class="btn btn-success">Export to Excel</a>
                                <a href="#" class="btn btn-info">Export to CSV</a>
                                <a href="#" class="btn btn-danger">Export to PDF</a>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                </div>
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Barang</th>
                                                <th>Jumlah Pesan</th>
                                                <th>Jumlah Harga</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Tanggal Disetujui</th>
                                                <th>Status</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($approvedOrders as $order)
                                                <tr>
                                                    <td>{{ $order->kode }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#detailModal{{ $order->id }}">
                                                            Detail <i class="bi bi-eye"></i>
                                                        </button>
                                                        <div class="modal fade" id="detailModal{{ $order->id }}"
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
                                                                                @foreach ($order->items as $item)
                                                                                    <tr>
                                                                                        <td>{{ $item->product->nama }}</td>
                                                                                        <td>{{ $item->jumlah_pesan }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $order->total_jumlah_pesan }}</td>
                                                    <td>{{ number_format($order->total_jumlah_harga, 0, ',', '.') }}</td>
                                                    <td>{{ $order->tanggal_pembelian }}</td>
                                                    <td>{{ $order->tanggal_approved }}</td>
                                                    <td>
                                                        <span class="badge bg-success">{{ $order->status }}</span>
                                                    </td>
                                                    <td>
                                                        <img class="img-fluid"
                                                            src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                            alt="Image" width="50" data-toggle="modal"
                                                            data-target="#imageModal{{ $order->id }}">
                                                        <div class="modal fade" id="imageModal{{ $order->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Gambar</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img class="img-fluid"
                                                                            src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                                            alt="Image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $order->keterangan }}</td>
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
