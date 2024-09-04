@extends('layoutadmin.layout')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Daftar Barang</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="btn-group" role="group" aria-label="Export buttons">
                                    <a href="" class="btn btn-success">Export to Excel</a>
                                    <a href="" class="btn btn-info">Export to CSV</a>
                                    <a href="" class="btn btn-danger">Export to PDF</a>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('/barang/create') }}" class="btn btn-primary">Input Barang</a>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body"></div>
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>KODE</th>
                                                <th>NAMA</th>
                                                <th>PEMASOK</th>
                                                <th>SALDO AWAL</th>
                                                <th>HARGA BELI AKHIR</th>
                                                <th>HARGA JUAL</th>
                                                <th>TANGGAL EXP</th>
                                                <th>HARGA MODAL</th>
                                                <th>FOTO</th>
                                                {{-- <th>DESC</th> --}}
                                                {{-- <th>PAJANG</th> --}}
                                                <th>SALDO AKHIR</th>
                                                <th>SATUAN</th>
                                                <th>KATEGORI</th>
                                                <th>EDIT</th>
                                                <th>DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            use Illuminate\Support\Facades\DB;
                                            $result = DB::table('tbproduk')
                                                ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbproduk.id_satuan')
                                                ->leftJoin('tbkategori', 'tbkategori.id', '=', 'tbproduk.id_kategori')
                                                ->leftJoin('tbpemasok', 'tbpemasok.id', '=', 'tbproduk.id_pemasok')
                                                ->select('tbproduk.*', 'tbsatuan.nama as namasatuan', 'tbkategori.nama as namakategori', 'tbpemasok.nama as namapemasok')
                                                ->orderBy('tbproduk.id', 'DESC')
                                                ->get();
                                            $no = 0;

                                            foreach ($result as $key => $value) {
                                                $no++;
                                            ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value->kode }}</td>
                                                <td>{{ $value->nama }}</td>
                                                <td>{{ $value->namapemasok }}</td>
                                                <td>{{ number_format($value->saldo_awal, 0, ',', '.') }}</td>
                                                <td>{{ number_format($value->harga_beli_akhir, 0, ',', '.') }}</td>
                                                <td>{{ number_format($value->harga_jual, 0, ',', '.') }}</td>
                                                <td>{{ $value->tglexp }}</td>
                                                <td>{{ number_format($value->harga_modal, 0, ',', '.') }}</td>
                                                <td><img class="img-fluid" src="{{ asset('image/' . $value->foto) }}"
                                                        alt="image" style="max-width: 100px; max-height: 100px;"></td>
                                                {{-- <td>{{ $value->desc }}</td> --}}
                                                {{-- <td>{{ $value->pajang }}</td> --}}
                                                <td>{{ number_format($value->saldo_akhir, 0, ',', '.') }}</td>
                                                <td>{{ $value->namasatuan }}</td>
                                                <td>{{ $value->namakategori }}</td>
                                                <td>
                                                    <a href="{{ url('barang/' . $value->id) }}" class="btn btn-success"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ url('barang/' . $value->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Anda Yakin Menghapus?')"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                            Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php } ?>
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
