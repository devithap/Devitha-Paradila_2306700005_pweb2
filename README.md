# 🛒 UTS Public API CodeIgniter 4

Nama: Devitha Paradila  
NPM: 2306700005  
Kelas: TI 6A  

---

# 💖 Deskripsi Aplikasi

DevithaShop merupakan aplikasi e-commerce sederhana berbasis web menggunakan Framework CodeIgniter 4 dan Public API FakeStoreAPI.

Aplikasi ini dibuat untuk memenuhi tugas UTS Pemrograman Web 2.

---

# ✨ Fitur Aplikasi

- Menampilkan produk dari Public API
- Menampilkan detail produk
- Search produk
- Cart / keranjang belanja
- Tambah dan hapus produk cart
- Checkout pesanan
- Penyimpanan data pesanan ke database MySQL
- Menampilkan data pesanan pelanggan

---

# ⚙️ Teknologi Yang Digunakan

- CodeIgniter 4
- PHP
- MySQL
- JavaScript
- HTML
- CSS
- FakeStore API

---

# 🗄️ Database

Nama Database:

```sql
devithashop
```

Nama Tabel:

```sql
pesanan
```

Struktur Tabel:

```sql
CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    produk LONGTEXT,
    total BIGINT
);
```

---

# ▶️ Cara Menjalankan Project

### 1. Jalankan XAMPP
Aktifkan:
- Apache
- MySQL

---

### 2. Buat Database

Buka phpMyAdmin lalu buat database:

```sql
devithashop
```

---

### 3. Buat Tabel Pesanan

```sql
CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    produk LONGTEXT,
    total BIGINT
);
```

---

### 4. Jalankan Project CI4

Buka terminal VS Code:

```bash
php spark serve
```

---

### 5. Buka Browser

```bash
http://localhost:8080
```

---

# 📂 Struktur File Penting

- app/Controllers/Shop.php
- app/Controllers/Checkout.php
- app/Controllers/Pesanan.php
- app/Views/shop.php
- app/Views/pesanan.php
- public/script.js
- app/Config/Routes.php

---

# 🧾 Penjelasan Fitur

## 🛍️ Produk

Produk diambil dari FakeStoreAPI menggunakan JavaScript fetch API.

---

## 🔍 Search

Pengguna dapat mencari produk berdasarkan nama produk.

---

## 🛒 Cart

Produk yang dipilih akan masuk ke keranjang menggunakan localStorage.

---

## 💳 Checkout

Saat checkout:
- Nama pelanggan
- Alamat
- Data produk
- Total harga

akan disimpan ke database MySQL.

---

## 📦 Data Pesanan

Halaman pesanan digunakan untuk menampilkan seluruh data checkout pelanggan yang tersimpan di database.

---

# 🎥 Link Video Demonstrasi

https://youtu.be/NjwrapR7csY?si=uSchXRlqjLKNHR0E

---

# 📄 Link Laporan PDF

https://drive.google.com/file/d/12cxlaTn6DTyJbwiaPoCqkQ7r3bYn-RdW/view?usp=drive_link

---

# 👩‍💻 Author

Devitha Paradila  
2306700005