<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DevithaShop</title>

    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">

        <h2>
            DevithaShop 🛒
            <span id="jumlahCart" class="badge">0</span>
        </h2>

        <div class="nav-menu">
            <button onclick="window.scrollTo(0,0)">
                Home
            </button>

            <button onclick="document.getElementById('cartBox').scrollIntoView()">
                Cart
            </button>
        </div>

    </div>

    <!-- CONTENT -->
    <div class="container">

        <h1 class="title">
            Belanja Cantik 💖
        </h1>

        <p class="subtitle">
            Temukan produk favorit kamu di sini ✨
        </p>

        <!-- SEARCH -->
        <input
            type="text"
            id="search"
            placeholder="Cari produk...">

        <!-- PRODUK -->
        <div id="data"></div>

    </div>

    <!-- POPUP DETAIL -->
    <div
        id="detail"
        class="popup"
        style="display:none;">
    </div>

    <!-- CART -->
    <div class="cart-box" id="cartBox">

        <h2>Keranjang 🛒</h2>

        <div id="cart"></div>

        <h3 id="total"></h3>

        <!-- INPUT -->
        <input
            type="text"
            id="nama"
            placeholder="Nama Pembeli">

        <input
            type="text"
            id="alamat"
            placeholder="Alamat Lengkap">

        <!-- BUTTON -->
        <button onclick="checkout()">
            Checkout
        </button>

        <button onclick="clearCart()">
            Kosongkan Cart
        </button>

    </div>

    <!-- NOTIF -->
    <div id="notif" class="notif">
        ✅ Produk berhasil ditambahkan
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <p>
            © 2026 DevithaShop 💖
            | Dibuat dengan cinta ✨
        </p>
    </div>

    <!-- SCRIPT -->
    <script src="<?= base_url('script.js') ?>"></script>

</body>

</html>