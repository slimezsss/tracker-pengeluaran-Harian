# tracker-pengeluaran-Harian
Implementasi konsep Model View Controller (MVC) menggunakan Framework Laravel. Aplikasi yang dibuat yaitu aplikasi untuk mencatat dan melacak pengeluaran harian. Fitur yang tersedia meliputi tambah, edit, hapus, dan filter pengeluaran berdasarkan bulan dan kategori, serta menampilkan ringkasan total pengeluaran.

# Struktur MVC
| Komponen   | File                                             |
| ---------- | ------------------------------------------------ |
| Model      | `app/Models/Pengeluaran.php`                     |
|            | `app/Models/Kategori.php`                        |
| View       | `resources/views/pengeluaran/`                   |
|            | `index.blade.php`                                |
|            | `create.blade.php`                               |
|            | `edit.blade.php`                                 |
|            | `layouts/app.blade.php`                          |
| Controller | `app/Http/Controllers/PengeluaranController.php` |
| Routes     | `routes/web.php`                                 |

# Fitur

Dashboard (tampilan utama berisi ringkasan total pengeluaran bulan ini, hari ini, dan jumlah transaksi)
<img width="865" height="555" alt="image" src="https://github.com/user-attachments/assets/1e23e168-9956-45e3-aad6-92be00093439" />

Tambah Pengeluaran (form untuk mencatat pengeluaran baru dengan kategori, judul, jumlah, tanggal, dan catatan)
<img width="921" height="544" alt="image" src="https://github.com/user-attachments/assets/27f1423b-f42d-47a3-bd76-d4df7b6437bb" />

Edit Pengeluaran (ubah data pengeluaran yang sudah dicatat)
<img width="934" height="548" alt="image" src="https://github.com/user-attachments/assets/16dfb68a-c18b-4dbe-b83c-28da5b104fa6" />

Hapus Pengeluaran (hapus data pengeluaran dengan konfirmasi)
<img width="859" height="445" alt="image" src="https://github.com/user-attachments/assets/8509ed21-42fd-41da-8703-efd1c348889e" />

Filter Bulan (filter daftar pengeluaran berdasarkan bulan dan tahun)
<img width="883" height="253" alt="image" src="https://github.com/user-attachments/assets/d211028f-dc5c-4a22-8a1a-2dc6c9138a1e" />

Filter Kategori (filter pengeluaran berdasarkan kategori (Makanan, Transportasi, Belanja, dll.))
<img width="835" height="394" alt="image" src="https://github.com/user-attachments/assets/e021d9cd-6bc6-4f26-9245-e7b40dd74906" />

Total Otomatis (total pengeluaran dihitung otomatis di bawah tabel)
<img width="852" height="419" alt="image" src="https://github.com/user-attachments/assets/35ae68dd-1936-4759-a5a8-ea055e844817" />

