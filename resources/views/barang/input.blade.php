@extends('layoutadmin.layout')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Manajemen barang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Input barang</li>
            </ol>
        </nav>

        <div class="page-content">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORM INPUT BARANG</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ url('barang') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kode">KODE</label>
                                                    <input type="text" id="kode" class="form-control"
                                                        placeholder="Kode" name="kode">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama">NAMA</label>
                                                    <input type="text" id="nama" class="form-control"
                                                        placeholder="Nama" name="nama">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">PEMASOK</label>
                                                    <select name="id_pemasok" id="id_pemasok" class="form-control">
                                                        <option value="" selected disabled>pilih pemasok</option>
                                                        <?php
                                                        $rec = App\Models\tbpemasok::all();
                                                        foreach ($rec as $pemasok) {
                                                            echo "<option value=\"{$pemasok->id}\">{$pemasok->nama}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="id_satuan">ID SATUAN</label>
                                                    <select name="id_satuan" id="id_satuan" class="form-control">
                                                        <option value="" selected disabled>pilih satuan</option>
                                                        <?php
                                                        $rec = App\Models\tbsatuan::all();
                                                        foreach ($rec as $satuan) {
                                                            echo "<option value=\"{$satuan->id}\">{$satuan->nama}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">KATEGORI</label>
                                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                                        <option value="" selected disabled>pilih kategori</option>
                                                        <?php
                                                        $rec = App\Models\tbkategori::all();
                                                        foreach ($rec as $kategori) {
                                                            echo "<option value=\"{$kategori->id}\">{$kategori->nama}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="saldo_awal">SALDO AWAL</label>
                                                    <input type="text" id="saldo_awal" class="form-control"
                                                        name="saldo_awal" placeholder="Saldo awal">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="harga_beli_akhir">HARGA BELI AKHIR</label>
                                                    <input type="text" id="harga_beli_akhir" class="form-control"
                                                        name="harga_beli_akhir" placeholder="harga beli akhir">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="harga_jual">HARGA JUAL</label>
                                                    <input type="text" id="harga_jual" class="form-control"
                                                        name="harga_jual" placeholder="harga jual">
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="tglexp">TANGGAL KADALUARSA</label>
                                                    <input type="date" id="tglexp" class="form-control" name="tglexp"
                                                        placeholder="tanggal kadaluarsa">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="harga_modal">HARGA MODAL</label>
                                                    <input type="text" id="harga_modal" class="form-control"
                                                        name="harga_modal" placeholder="Harga modal">
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="pajang">PAJANG</label>
                                                    <input type="text" id="pajang" class="form-control" name="pajang"
                                                        placeholder="Pajang">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="foto">FOTO</label>
                                                    <input type="file" id="foto" class="form-control"
                                                        name="foto" placeholder="foto">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="desc">DESKRIPSI</label>
                                                    <textarea id="desc" class="form-control" name="desc" placeholder="Deskripsi"></textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="saldo_akhir">SALDO AKHIR</label>
                                                    <input type="text" id="saldo_akhir" class="form-control"
                                                        name="saldo_akhir" placeholder="Saldo akhir">
                                                </div>
                                            </div> --}}


                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('layoutadmin.footer')
    </div>
@endsection
