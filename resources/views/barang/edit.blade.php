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
                                    <?php
                                    $rec = DB::table('tbproduk')->where('id', $id)->first();
                                    ?>

                                    <form action="{{ url('barang/' . $id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kode">KODE</label>
                                                    <input type="text" id="kode" class="form-control"
                                                        placeholder="Kode" name="kode" value="{{ $rec->kode }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama">NAMA</label>
                                                    <input type="text" id="nama" class="form-control"
                                                        placeholder="Nama" name="nama" value="{{ $rec->nama }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">NAMA PEMASOK</label>
                                                    <select name="id_pemasok" id="id_pemasok" class="form-control">
                                                        <option value="" selected disabled>pilih pemasok</option>
                                                        <?php
                                                        $recpemasok = App\Models\tbpemasok::all();
                                                        foreach ($recpemasok as $pemasok) {
                                                            $select = $pemasok->id == $rec->id_pemasok ? 'selected' : '';
                                                            echo "<option value=\"{$pemasok->id}\" $select>{$pemasok->nama}</option> ";
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
                                                        $recsatuan = App\Models\tbsatuan::all();
                                                        foreach ($recsatuan as $satuan) {
                                                            $select = $satuan->id == $rec->id_satuan ? 'selected' : '';
                                                            echo "<option value=\"{$satuan->id}\" $select>{$satuan->nama}</option> ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">ID KATEGORI</label>
                                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                                        <option value="" selected disabled>pilih kategori</option>
                                                        <?php
                                                        $reckategori = App\Models\tbkategori::all();
                                                        foreach ($reckategori as $kategori) {
                                                            $select = $kategori->id == $rec->id_kategori ? 'selected' : '';
                                                            echo "<option value=\"{$kategori->id}\" $select>{$kategori->nama}</option> ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="saldo_awal">SALDO AWAL</label>
                                                    <input type="number" id="saldo_awal" class="form-control"
                                                        name="saldo_awal" placeholder="Saldo awal"
                                                        value="{{ $rec->saldo_awal }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="harga_beli_akhir">HARGA BELI AKHIR</label>
                                                    <input type="number" id="harga_beli_akhir" class="form-control"
                                                        name="harga_beli_akhir" placeholder="harga beli akhir"
                                                        value="{{ $rec->harga_beli_akhir }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="harga_jual">HARGA JUAL</label>
                                                    <input type="number" id="harga_jual" class="form-control"
                                                        name="harga_jual" placeholder="harga jual"
                                                        value="{{ $rec->harga_jual }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="tglexp">TANGGAL KADALUARSA</label>
                                                    <input type="date" id="tglexp" class="form-control"
                                                        name="tglexp" placeholder="tanggal kadaluarsa"
                                                        value="{{ $rec->tglexp }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="harga_modal">HARGA MODAL</label>
                                                    <input type="number" id="harga_modal" class="form-control"
                                                        name="harga_modal" placeholder="Harga modal"
                                                        value="{{ $rec->harga_modal }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="desc">DESKRIPSI</label>
                                                    <input type="text" id="desc" class="form-control"
                                                        name="desc" placeholder="Deskripsi"
                                                        value="{{ $rec->desc }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="pajang">PAJANG</label>
                                                    <input type="text" id="pajang" class="form-control"
                                                        name="pajang" placeholder="Pajang" value="{{ $rec->pajang }}">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="foto">FOTO</label>
                                                        <input type="file" id="foto" class="form-control"
                                                            name="foto" placeholder="foto"
                                                            value="{{ $rec->foto }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="saldo_akhir">SALDO AKHIR</label>
                                                    <input type="number" id="saldo_akhir" class="form-control"
                                                        name="saldo_akhir" placeholder="Saldo akhir"
                                                        value="{{ $rec->saldo_akhir }}" readonly>
                                                </div>
                                            </div>


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
