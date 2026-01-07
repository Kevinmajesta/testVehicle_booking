# Sistem Monitoring & Pemesanan Kendaraan Tambang (CI4)

Aplikasi ini dirancang untuk mengelola armada kendaraan di perusahaan tambang nikel, mencakup pemesanan dengan persetujuan berjenjang dan monitoring biaya operasional.

### Tech Stack
- **Framework:** CodeIgniter 4.6.4
- **PHP Version:** 8.2.12
- **Database:** MySQL
- **Library:** Chart.js (Grafik), PHPOffice (Excel Export)

### Akun Login
| Role | Username | Password |
| :--- | :--- | :--- |
| **Admin** | ahmad_admin | admin123 |
| **Atasan Level 1** | bambang_atasan1 | atasan123 |
| **Atasan Level 1** | bambang_atasan1 | atasan123 |
| **Atasan Level 2** | citra_atasan2 | atasan123 |

### Panduan Instalasi
1. Ekstrak file dan jalankan `composer install`.
2. Buat database `db_tambang` dan atur di file `.env`.
3. Jalankan migrasi: `php spark migrate`.
4. Jalankan seeder: `php spark db:seed MainSeeder`.
5. Run server: `php spark serve`.