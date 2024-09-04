@extends('layoutadmin.layout')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Halaman Verifikasi Pesanan</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4></h4>
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
                                                <th>Kode Pesanan</th>
                                                <th>Id User</th>
                                                <th>Barang</th>
                                                <th>Jumlah Pesan</th>
                                                <th>Total Harga</th>
                                                <th>Tanggal</th>
                                                <th>Bukti Bayar</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->groupBy('kode') as $orderGroup)
                                                @php
                                                    $firstOrder = $orderGroup->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $firstOrder->id }}</td>
                                                    <td>{{ $firstOrder->kode }}</td>
                                                    <td>{{ $firstOrder->id_user }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#detailModal{{ $firstOrder->id }}">
                                                            Detail <i class="bi bi-eye"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="detailModal{{ $firstOrder->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="detailModalLabel{{ $firstOrder->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="detailModalLabel{{ $firstOrder->id }}">
                                                                            Detail Pesanan {{ $firstOrder->kode }}</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"></button>
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
                                                                                @foreach ($orderGroup as $order)
                                                                                    <tr>
                                                                                        <td>{{ $order->product->nama }}</td>
                                                                                        <td>{{ $order->jumlah_pesan }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $orderGroup->sum('jumlah_pesan') }}</td>
                                                    <td>{{ number_format($orderGroup->sum('jumlah_harga'), 0, ',', '.') }}
                                                    </td>
                                                    <td>{{ $firstOrder->tanggal }}</td>
                                                    <td>
                                                        <img class="img-fluid"
                                                            src="{{ asset('storage/' . $firstOrder->foto) }}"
                                                            alt="Bukti Bayar" width="50" data-toggle="modal"
                                                            data-target="#imageModal{{ $firstOrder->id }}">
                                                        <div class="modal fade" id="imageModal{{ $firstOrder->id }}"
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
                                                                            src="{{ asset('storage/' . $firstOrder->foto) }}"
                                                                            alt="Bukti Bayar">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($firstOrder->status == 'pending')
                                                            <span class="badge bg-warning">Pending</span>
                                                        @elseif ($firstOrder->status == 'approved')
                                                            <span class="badge bg-success">Approved</span>
                                                        @elseif ($firstOrder->status == 'canceled')
                                                            <span class="badge bg-danger">Canceled</span>
                                                        @elseif ($firstOrder->status == 'returned')
                                                            <span class="badge bg-info">Returned</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($firstOrder->status == 'pending')
                                                            <form action="{{ route('admin.orders.approve', ['kode' => $firstOrder->kode]) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-primary">Approve</button>
                                                            </form>
                                                    
                                                            <form action="{{ route('admin.orders.cancel', ['kode' => $firstOrder->kode]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?');">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                                            </form>
                                                        @elseif ($firstOrder->status == 'approved')
                                                            <span class="text-success">Approved</span>
                                                    
                                                            <form action="{{ route('admin.orders.return', ['kode' => $firstOrder->kode]) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-warning">Return</button>
                                                            </form>
                                                        @elseif ($firstOrder->status == 'canceled')
                                                            <span class="text-danger">Canceled</span>
                                                        @endif
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
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span> by <a
                            href="https://saugi.me">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection
