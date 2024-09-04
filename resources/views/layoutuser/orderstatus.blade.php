<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('templbuah/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('templbuah/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('templbuah/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('templbuah/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('templbuah/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('templbuah/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('templbuah/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('templbuah/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ url('index') }}">Home</a></li>
                <li><a href="{{ url('shop') }}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ url('detail') }}">Shop Details</a></li>
                        <li><a href="{{ url('cart') }}">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('index') }}"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ url('index') }}">Home</a></li>
                            <li class="active"><a href="{{ url('shop') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ url('detail') }}">Shop Details</a></li>
                                    <li><a href="{{ url('cart') }}">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('templbuah/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('index') }}">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    {{-- <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter
                        your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Tampilkan pesan kesalahan validasi -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Jumlah</span></div>
                                @php $subtotal = 0; @endphp
                                <ul>
                                    @foreach ($products as $produk)
                                        <input type="hidden" name="products[{{ $loop->index }}][id_barang]"
                                            value="{{ $produk->id }}">
                                        <input type="hidden" name="products[{{ $loop->index }}][jumlah_pesan]"
                                            value="{{ $produk->jumlah_pesan }}">
                                        <li>
                                        <li>
                                            {{ $produk->tbproduk->nama }}
                                            <span>{{ $produk->jumlah_pesan }}</span>
                                        </li>
                                        @php
                                            $total_per_produk = $produk->tbproduk->harga_jual * $produk->jumlah_pesan;
                                            $subtotal += $total_per_produk;
                                        @endphp
                                    @endforeach
                                </ul>
                                <div class="checkout__order__total">Total <span>Rp.
                                        {{ number_format($subtotal) }}</span></div>

                                <!-- Form untuk upload bukti bayar -->
                                <div class="form-group mt-3">
                                    <label for="bukti_bayar">Upload Bukti Bayar</label>
                                    <input type="file" class="form-control-file" id="bukti_bayar"
                                        name="bukti_bayar" required>
                                </div>
                                <div class="mt-3">
                                    <img src="{{ asset('image/qris_logo.png') }}" alt="QRIS Logo" class="mr-3"
                                        style="height: auto; width: 60px;">
                                    <img src="{{ asset('image/ovo_logo.png') }}" alt="OVO Logo" class="mr-3"
                                        style="height: auto; width: 60px;">
                                    <img src="{{ asset('image/shopee_pay.png') }}" alt="ShopeePay Logo"
                                        class="mr-3" style="height: auto; width: 60px;">
                                    <img src="{{ asset('image/dana_logo.png') }}" alt="Dana Logo" class="mr-3"
                                        style="height: auto; width: 60px;">
                                </div>

                                <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </section> --}}
    <!-- Checkout Section End -->

    <div class="container">
        <h1 class="mt-4">Data Mutasi</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="container">
            <h1 class="mt-4">Data Mutasi</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Pesanan</th>
                            <th>MK</th>
                            <th>Barang</th>
                            <th>Jumlah Pesan</th>
                            <th>Jumlah Harga</th>
                            <th>Tanggal Pembelian</th>
                            <th>Tanggal Approved</th>
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mutasi as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td>{{ $m->kode_pesanan }}</td>
                                <td>{{ $m->MK }}</td>
                                <td>{{ $m->product->nama }}</td>
                                <td>{{ $m->jumlah_pesan }}</td>
                                <td>{{ number_format($m->jumlah_harga, 0, ',', '.') }}</td>
                                <td>{{ $m->tanggal_pembelian }}</td>
                                <td>{{ $m->tanggal_approved }}</td>
                                <td>{{ $m->status }}</td>
                                <td>
                                    @if ($m->bukti_pembayaran)
                                        <img src="{{ asset('storage/' . $m->bukti_pembayaran) }}"
                                            alt="Bukti Pembayaran" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <span>Tidak ada bukti</span>
                                    @endif
                                </td>
                                <td>{{ $m->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <h1 class="mt-4">Status Pesanan</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Pesanan</th>
                            <th>Barang</th>
                            <th>Jumlah Pesan</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->kode }}</td>
                                <td>{{ $order->product->nama }}</td>
                                <td>{{ $order->jumlah_pesan }}</td>
                                <td>{{ number_format($order->jumlah_harga, 0, ',', '.') }}</td>
                                <td>{{ $order->tanggal }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($order->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif ($order->status == 'canceled')
                                        <span class="badge badge-danger">Canceled</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <h1 class="mt-4">Status Pesanan</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Pesanan</th>
                            <th>Barang</th>
                            <th>Jumlah Pesan</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->kode }}</td>
                                <td>{{ $order->product->nama }}</td>
                                <td>{{ $order->jumlah_pesan }}</td>
                                <td>{{ number_format($order->jumlah_harga, 0, ',', '.') }}</td>
                                <td>{{ $order->tanggal }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($order->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif ($order->status == 'canceled')
                                        <span class="badge badge-danger">Canceled</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer Section Begin -->
        <footer class="footer spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__about__logo">
                                <a href="{{ url('index') }}"><img src="img/logo.png" alt=""></a>
                            </div>
                            <ul>
                                <li>Address: 60-49 Road 11378 New York</li>
                                <li>Phone: +65 11.188.888</li>
                                <li>Email: hello@colorlib.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                        <div class="footer__widget">
                            <h6>Useful Links</h6>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">About Our Shop</a></li>
                                <li><a href="#">Secure Shopping</a></li>
                                <li><a href="#">Delivery infomation</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Who We Are</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Innovation</a></li>
                                <li><a href="#">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                            <h6>Join Our Newsletter Now</h6>
                            <p>Get E-mail updates about our latest shop and special offers.</p>
                            <form action="#">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit" class="site-btn">Subscribe</button>
                            </form>
                            <div class="footer__widget__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__copyright">
                            <div class="footer__copyright__text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i
                                        class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                        target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                            <div class="footer__copyright__payment"><img src="img/payment-item.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="{{ url('templbuah/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('templbuah/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('templbuah/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ url('templbuah/js/jquery-ui.min.js') }}"></script>
        <script src="{{ url('templbuah/js/jquery.slicknav.js') }}"></script>
        <script src="{{ url('templbuah/js/mixitup.min.js') }}"></script>
        <script src="{{ url('templbuah/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('templbuah/js/main.js') }}"></script>



</body>

</html>
