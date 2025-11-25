# TP9DPBO2425C2

## Janji

Saya **Repa Pitriani** dengan NIM **2402499** mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Struktur Folder

```text
├── Folder Dokumentasi/
│
├── Project/
│   ├── models/
│   │   ├── DB.php
│   │   ├── Pembalap.php
│   │   ├── Sponsor.php
│   │   ├── TabelPembalap.php
│   │   ├── TabelSponsor.php
│   │   ├── KontrakModel.php
│   │   └── KontrakModelSponsor.php
│   │
│   ├── views/
│   │   ├── ViewPembalap.php
│   │   ├── ViewSponsor.php
│   │   ├── KontrakView.php
│   │   └── KontrakViewSponsor.php
│   │
│   ├── presenters/
│   │   ├── PresenterPembalap.php
│   │   ├── PresenterSponsor.php
│   │   ├── KontrakPresenter.php
│   │   └── KontrakPresenterSponsor.php
│   │
│   ├── template/
│   │   ├── skin.html
│   │   ├── form.html
│   │   ├── skin_sponsor.html
│   │   └── form_sponsor.html
│   │
│   └── index.php
│
├── mpv_db.sql
└── README.md
```

## Penjelasan Arsitektur MVp

Proyek ini menggunakan arsitektur **Model-View-Presenter (MVP)** yang memisahkan logika bisnis, tampilan, dan data secara tegas. Berikut adalah pembagian tugasnya:

### 1. Models (Pengelola Data)
Bagian ini bertugas merepresentasikan data dan mengelola interaksi langsung dengan database.

- **models/DB.php**: Class induk untuk koneksi database menggunakan PDO. 
- **models/TabelPembalap.php & TabelSponsor.php**: Mengelola query SQL (CRUD) untuk tabel `pembalap` dan `sponsor`.
- **models/KontrakModel..**: Interface yang memastikan setiap Model memiliki metode standar yang wajib diimplementasikan.

### 2. Views (Antarmuka Pengguna)
Bagian ini bertugas menampilkan data ke pengguna. View tidak boleh berinteraksi langsung dengan Model/Database.

- **views/ViewPembalap.php & ViewSponsor.php**: Menerima data dari Presenter lalu menggabungkannya dengan file HTML di folder `template/`.
- **template/**: Berisi file HTML murni (`skin.html`, `form.html`) yang berfungsi sebagai kerangka tampilan (UI).

### 3. Presenters (Penghubung & Logika)
Bagian ini bertugas sebagai "otak" yang menghubungkan Model dan View.

- **presenters/PresenterPembalap.php & PresenterSponsor.php**: Menerima input dari index.php, meminta data dari Model, lalu mengirimkan data tersebut ke View untuk ditampilkan.
- **presenters/KontrakPresenter...**: Interface untuk menjaga konsistensi metode pada Presenter.

### 4. Templates (Kerangka Desain)
Bagian ini berisi file desain antarmuka (UI) yang terpisah dari logika program.

- **template/skin.html & skin_sponsor.htm**: File HTML murni untuk menampilkan tabel daftar data. Menggunakan penanda DATA_TABEL untuk diisi oleh View.
- **template/form.html & form_sponsor.html**: File HTML murni untuk menampilkan formulir tambah/edit data.
  
## Fitur Utama

- **Arsitektur MVP**: Implementasi ketat pola MVP dimana View dan Model benar-benar terpisah. 
- **Penggunaan Interface**: Setiap komponen (Model, View, Presenter) menggunakan Kontrak/Interface untuk standarisasi kode.
- **Manajemen Pembalap (CRUD)**:  
  - Menampilkan daftar pembalap F1.
  - Menambah, mengedit, dan menghapus data pembalap.
- **Manajemen Sponsor (Fitur Baru)**:  
  - Menampilkan daftar sponsor balapan.
  - Form input khusus untuk data sponsor (Nama Brand, Jenis Produk, Nilai Kontrak, Durasi).
  - Fitur Edit dan Hapus data sponsor.
- **Navigasi Halaman**: Perpindahan antar halaman Pembalap dan Sponsor melalui `index.php`.

## Dokumentasi

Klik thumbnail di bawah untuk menonton demo program:

[![Demo Program](https://img.youtube.com/vi/SxlWfgqNFaw/0.jpg)](https://youtu.be/SxlWfgqNFaw)

