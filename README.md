# Sistem Pemesanan Makanan

![finalweb](https://github.com/user-attachments/assets/f57c2bf9-6d07-4035-bb17-bf75063426b4)

Proyek ini adalah sistem pemesanan makanan berbasis web yang dirancang untuk memberikan pengalaman pemesanan yang cepat dan efisien bagi pelanggan dan administrator restoran. Berikut adalah detail tentang teknologi yang digunakan, fitur yang disediakan, dan hasil yang dicapai.

## Teknologi yang Digunakan

- **HTML5 & CSS3:** 
  - Digunakan untuk membuat struktur dan desain halaman web.
  - Memastikan desain responsif untuk berbagai perangkat, termasuk desktop dan mobile.
- **JavaScript:** 
  - Meningkatkan interaktivitas sisi klien, seperti penanganan keranjang belanja, validasi input, dan modal untuk input data pelanggan.
- **PHP:** 
  - Bahasa pemrograman sisi server yang digunakan untuk menangani logika bisnis dan interaksi database.
- **MySQL:** 
  - Sistem manajemen basis data relasional yang digunakan untuk menyimpan informasi menu, pesanan, dan detail pelanggan, dan user admin.

## Fitur

### Fitur Admin

1. **Login Admin:**
   - Sistem login sederhana untuk admin menggunakan PHP untuk demonstrasi.
   
2. **Manajemen Menu:**
   - Admin dapat menambah, mengedit, dan menghapus item menu melalui antarmuka yang mudah digunakan.
   
3. **Antrean Pesanan:**
   - Admin dapat melihat daftar semua pesanan yang dibuat oleh pelanggan, termasuk detail pesanan dan total harga.

### Fitur Pelanggan

1. **Form Pemesanan:**
   - Pelanggan dapat dengan mudah menambah item ke keranjang belanja dan melakukan pemesanan dengan memasukkan nomor meja dan nama mereka.
   
2. **Keranjang Belanja Dinamis:**
   - Pelanggan dapat melihat item yang ditambahkan ke keranjang, termasuk jumlah dan total harga, sebelum melanjutkan ke checkout.

## Cara Kerja

### Sistem Login

- Form login terletak di halaman `login_page.php`.
- Kredensial admin di-hardcode untuk demonstrasi:
  - **Username:** `admin`
  - **Password:** `admin`
- Setelah login berhasil, pengguna akan dialihkan ke dashboard admin (`admin/panel_admin.php`).

### Dashboard Admin

- **Manajemen Menu:** 
  - Admin dapat menambah item menu baru, mengedit yang sudah ada, atau menghapusnya.
- **Lihat Antrean:**
  - Admin dapat melihat daftar pesanan yang dilakukan, melihat detail pesanan, dan memantau status pesanan.

### Pemesanan Pelanggan

- Pelanggan dapat menjelajahi menu dan menambah item ke keranjang.
- Keranjang secara dinamis memperbarui jumlah total item dan total harga.
- Pelanggan dapat melanjutkan ke checkout dengan memasukkan nomor meja dan nama mereka.

## Struktur File

- `index.php`: Halaman login utama.
- `checkout.php`: Untuk memasukkan data pesanan ke database.
- `login_page.php`: Halaman untuk login ke admin panel.
- `order_success.php`: Halaman untuk menampilkan rincian dan total belanja dari pelanggan dan juga bisa print halaman ordernya.
- `admin/`: Direktori yang berisi halaman dan skrip terkait admin.
  - `panel_admin.php`: Dashboard admin.
  - `add_menu.php`: Halaman untuk menambah item menu baru.
  - `edit_menu.php`: Halaman untuk mengedit item menu yang ada.
  - `delete_menu.php`: Skrip untuk menghapus item menu.
  - `queue.php`: Halaman untuk melihat antrean pesanan.
  - `order_details.php`: Halaman untuk melihat detail dari pesanan tertentu.
- `includes/`: Direktori untuk konfigurasi database.
  - `config.php`: File konfigurasi database.
- `assets/`: Direktori untuk file CSS dan JavaScript.
  - `css/`: Berisi `styles.css` untuk styling.
  - `js/`: Berisi file JavaScript untuk fungsionalitas tambahan.

## Instalasi

1. Clone repository:
   ```sh
   git clone https://github.com/yourusername/food-ordering-system.git
2. Arahkan ke direktori project:
   ```sh
   cd food-ordering-system
3. Atur server web agar direct ke direktori project.
4. Buka includes/config.php dan konfigurasikan pengaturan koneksi database Anda.
5. Impor file SQL yang ada di main untuk mengatur database:
   [SQL File](https://github.com/kolomonyong/pemesanan_makanan_uas/blob/main/food_ordering.sql)
6. Lalu akses melalui browser dan isi konten dengan panel admin, agar list makanan tersedia di menu.
