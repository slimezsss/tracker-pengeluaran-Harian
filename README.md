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

