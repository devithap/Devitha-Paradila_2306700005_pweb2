document.addEventListener("DOMContentLoaded", function() {

    let semuaData = [];

    // ambil cart dari localStorage
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // amanin qty kalau belum ada
    cart.forEach(item => {
        if (!item.qty) item.qty = 1;
    });

    tampilCart();

    // fungsi format rupiah
    function rupiah(angka) {
        return angka.toLocaleString("id-ID");
    }

    // ambil API
    fetch('https://fakestoreapi.com/products')
    .then(res => res.json())
    .then(data => {
        semuaData = data;
        tampilkan(data);
    });

    // tampil produk
    function tampilkan(data) {
        let isi = "";

        data.forEach(item => {
            isi += `
            <div class="card">
                <h3>${item.title}</h3>
                <img src="${item.image}">
                <p class="harga">Rp ${rupiah(item.price * 15000)}</p>

                <p>⭐ ${item.rating.rate} (${item.rating.count})</p>

                <button onclick="lihatDetail(${item.id})">Detail</button>
                <button onclick="tambahCart(${item.id})">Tambah</button>
            </div>
            `;
        });

        document.getElementById("data").innerHTML = isi;
    }

    // search
    document.getElementById("search").addEventListener("keyup", function() {
        let keyword = this.value.toLowerCase();

        let hasil = semuaData.filter(item =>
            item.title.toLowerCase().includes(keyword)
        );

        tampilkan(hasil);
    });

    // detail popup
    window.lihatDetail = function(id) {
        let produk = semuaData.find(item => item.id === id);

        let isi = `
        <div class="popup-content">
            <h2>${produk.title}</h2>
            <img src="${produk.image}">
            <p><b>Harga:</b> Rp ${rupiah(produk.price * 15000)}</p>
            <p>${produk.description}</p>

            <button onclick="tutup()" style="position:sticky; bottom:0;">
                Tutup
            </button>
        </div>
        `;

        document.getElementById("detail").innerHTML = isi;
        document.getElementById("detail").style.display = "block";
    }

    window.tutup = function() {
        document.getElementById("detail").style.display = "none";
    }

    // tambah ke cart
    window.tambahCart = function(id) {
        let produk = semuaData.find(item => item.id === id);

        let itemAda = cart.find(item => item.id === id);

        if (itemAda) {
            itemAda.qty += 1;
        } else {
            let copyProduk = { ...produk, qty: 1 };
            cart.push(copyProduk);
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        tampilCart();
        document.getElementById("notif").style.display = "block";

setTimeout(() => {
    document.getElementById("notif").style.display = "none";
}, 1500);
    }

    // tampil cart
    function tampilCart() {
        let isi = "";
        let total = 0;

       cart.forEach((item, index) => {
    isi += `
    <div class="cart-item">
        
        <img src="${item.image}" class="cart-img">

        <div class="cart-info">
            <p>${item.title}</p>
            <p>${item.qty}x - Rp ${rupiah(item.price * item.qty * 15000)}</p>
        </div>

        <div class="cart-action">
            <button onclick="kurangCart(${index})">➖</button>
            <button onclick="tambahCart(${item.id})">➕</button>
            <button onclick="hapusCart(${index})">❌</button>
        </div>

    </div>
    `;
    total += item.price * item.qty * 15000;
});

        document.getElementById("cart").innerHTML = isi;
        document.getElementById("total").innerHTML = "Total: Rp " + rupiah(total);

        let jumlah = cart.reduce((total, item) => total + item.qty, 0);
document.getElementById("jumlahCart").innerText = jumlah;
    }

    // hapus cart
    window.hapusCart = function(index) {
        cart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        tampilCart();
    }

       window.clearCart = function() {
    cart = [];
    localStorage.removeItem("cart");
    tampilCart();
}

window.kurangCart = function(index) {
    if (cart[index].qty > 1) {
        cart[index].qty -= 1;
    } else {
        cart.splice(index, 1);
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    tampilCart();
}

    // klik luar popup untuk tutup
    window.onclick = function(event) {
        let popup = document.getElementById("detail");
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }

    window.checkout = function() {

    let nama = document.getElementById("nama").value;
    let alamat = document.getElementById("alamat").value;

    if (cart.length === 0) {
        alert("Keranjang kosong 😅");
        return;
    }

    if (nama === "" || alamat === "") {
        alert("Isi nama dan alamat dulu!");
        return;
    }

    // hitung total
    let totalHarga = 0;

    cart.forEach(item => {
        totalHarga += item.price * item.qty * 15000;
    });

    fetch('/checkout', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },

        body:
            'nama=' + encodeURIComponent(nama) +
            '&alamat=' + encodeURIComponent(alamat) +
            '&produk=' + encodeURIComponent(JSON.stringify(cart)) +
            '&total=' + totalHarga

    })

    .then(res => res.json())

    .then(data => {

        alert(
            "🎉 Checkout Berhasil! 💖\n\n" +
            "Terima kasih, " + nama + " 🛍️\n\n" +
            "📦 Pesanan akan dikirim ke:\n" +
            alamat + "\n\n" +
            "✨ Selamat berbelanja di DevitaShop ✨"
        );

        cart = [];

        localStorage.removeItem("cart");

        tampilCart();

    });

}
});