@extends('layoutadmin.layout')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Halaman Pemasok</h3>
        </div>
        <div class="page-content">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORM RESTOK BARANG</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('restok.store') }}" method="POST">
                                        @csrf
                                        <div id="restock-items">
                                            <div class="restock-item row">
                                                <div class="form-group col-md-3">
                                                    <label for="id_barang">Barang</label>
                                                    <select name="id_barang[]" class="form-control">
                                                        @foreach ($produks as $produk)
                                                            <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input type="number" name="jumlah[]" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="harga_beli_akhir">Harga Beli Akhir</label>
                                                    <input type="number" class="form-control" name="harga_beli_akhir[]"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="id_pemasok">Pemasok</label>
                                                    <select name="id_pemasok[]" class="form-control" required>
                                                        <option value="" selected disabled>Pilih pemasok</option>
                                                        @foreach ($pemasoks as $pemasok)
                                                            <option value="{{ $pemasok->id }}">{{ $pemasok->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-1 align-self-end">
                                                    <button type="button" class="btn btn-danger remove-item">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" id="add-item" class="btn btn-secondary mb-3">Tambah
                                            Barang</button>

                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="subtotal">Total</label>
                                            <input type="number" id="subtotal" class="form-control" name="subtotal"
                                                readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Restock</button>
                                    </form>

                                    <script>
                                        document.getElementById('add-item').addEventListener('click', function() {
                                            var newItem = document.querySelector('.restock-item').cloneNode(true);
                                            newItem.querySelector('select').selectedIndex = 0;
                                            newItem.querySelector('input[name="jumlah[]"]').value = '';
                                            newItem.querySelector('input[name="harga_beli_akhir[]"]').value = '';
                                            newItem.querySelector('.remove-item').addEventListener('click', function() {
                                                newItem.remove();
                                                calculateSubtotal();
                                            });
                                            document.getElementById('restock-items').appendChild(newItem);
                                        });

                                        document.getElementById('restock-items').addEventListener('input', function(event) {
                                            if (event.target.name === 'jumlah[]' || event.target.name === 'harga_beli_akhir[]') {
                                                calculateSubtotal();
                                            }
                                        });

                                        function calculateSubtotal() {
                                            var items = document.querySelectorAll('.restock-item');
                                            var subtotal = 0;
                                            items.forEach(function(item) {
                                                var jumlah = item.querySelector('input[name="jumlah[]"]').value;
                                                var harga = item.querySelector('input[name="harga_beli_akhir[]"]').value;
                                                subtotal += jumlah * harga;
                                            });
                                            document.getElementById('subtotal').value = subtotal;
                                        }

                                        document.querySelectorAll('.remove-item').forEach(function(button) {
                                            button.addEventListener('click', function() {
                                                button.closest('.restock-item').remove();
                                                calculateSubtotal();
                                            });
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('sweetalert::alert')

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
