# 🌐 WEB Manajemen Keanggotaan IBI

Sebuah aplikasi **open source** berbasis web untuk mempermudah manajemen keanggotaan IBI (Ikatan Bidan Indonesia). Proyek ini masih dalam tahap awal pengembangan (`v0.1.0`) dan terbuka untuk kontribusi dari siapa saja.

Dibangun menggunakan:
- ⚙️ Laravel 10
- 🗃️ MySQL
- 🎨 Tailwind & Laravel Vite (untuk frontend)

---

## 🚀 Fitur Utama

✅ **CRUD Role**  
✅ **CRUD User**  
✅ **Export Data User**  
✅ **Manajemen Data Ranting**  
✅ **Manajemen Data Personal Anggota**  
✅ **Kependudukan**  
✅ **Riwayat Pendidikan**  
✅ **Pelatihan**  
✅ **Perizinan**

Fitur-fitur ini akan terus dikembangkan untuk mendukung kebutuhan IBI secara menyeluruh.

---

## 📦 Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini secara lokal:

### 1. Fork dan Like Repository Ini ❤️
Klik tombol `Fork` di kanan atas dan jangan lupa kasih ⭐️ untuk mendukung proyek ini.

### 2. Clone Repository
```bash
git clone https://github.com/USERNAME/WEB-Manajemen-Keanggotaan-IBI.git
cd WEB-Manajemen-Keanggotaan-IBI
3. Install Dependensi Backend & Frontend
bash
Copy
Edit
composer install
npm install
4. Konfigurasi Environment
Copy file .env.example lalu ubah sesuai kebutuhan:

bash
Copy
Edit
cp .env.example .env
Generate app key Laravel:

bash
Copy
Edit
php artisan key:generate
5. Migrasi dan Seeder Database
Lakukan migrasi ulang dan isi database awal:

bash
Copy
Edit
php artisan migrate:fresh --seed
🧪 Akun default bisa disesuaikan di file: database/seeders/DatabaseSeeder.php

6. Build Asset Frontend
Untuk menjalankan Vite secara lokal:

bash
Copy
Edit
npm run dev
7. Jalankan Aplikasi
bash
Copy
Edit
php artisan serve
Akses aplikasi di: http://localhost:8000

🤝 Kontribusi
Proyek ini terbuka untuk kontribusi dari siapa saja!
Kamu bisa bantu dengan:

Menambahkan fitur baru

Memperbaiki bug

Menulis dokumentasi

Melakukan refactor atau optimasi

Silakan buat Pull Request atau buka Issue.

Setiap kontribusi sangat berarti 💪

🛠️ Catatan Pengembangan
Versi saat ini: v0.1.0

Roadmap ke depan:

🔐 Autentikasi berbasis OAuth/SSO

📊 Dashboard statistik

📤 Modul pelaporan dan notifikasi

📥 Import data dari Excel

🔌 REST API untuk integrasi dengan sistem lain

🪪 Lisensi
Kode dalam proyek ini dilisensikan di bawah MIT License.
Silakan digunakan, dimodifikasi, dan disebarkan dengan bebas.

📫 Kontak
Untuk pertanyaan, saran, atau kolaborasi, silakan hubungi melalui GitHub Issues.

Terima kasih sudah mendukung proyek ini!
✨ Jangan lupa kasih ⭐️ kalau kamu merasa ini bermanfaat!

yaml
Copy
Edit

---

Sudah dicek dari atas sampai bawah — semua bagian **utuh, rapi, dan bisa langsung dipakai di GitHub**.

Perlu saya bantu buat file `.md`-nya langsung biar bisa kamu download?