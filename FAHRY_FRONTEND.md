Baca FAHRY_github dan FAHRY_API dulu

Rencana frontend:
- rancangan frontend-user sederhana, 
    * page utama: tempat munculnya semua schedule yang belum selesai
        + Schedule memiliki tombol edit dan selesai
            - Jika tombol edit ditekan, ke page edit
            - Jika tombol selesai ditekan, panggil API finish, dan schedule akan hilang
        + Harus ada tombol + untuk menambahkan schedule
    
    * page create: tempat pembuatan schedule
        + page ini meminta:
            - Judul (wajib)
            - Deskripsi (tidak wajib)
            - Waktu selesai (tidak wajib)
                * Waktu dikirim dalam format angka TAHUN-BULAN-TANGGAL JAM:MENIT:DETIK
                    - Contoh: 2023-06-08 06:18:04
                        + Jika dibaca maka: Jam 6:18 pagi, 8 Juni 2023
        + jika pembuatan schedule berhasil, kembali ke page utama
    
    * page edit: tempat edit schedule
        + mirip dengan page create, cuman dengan isi data dari schedule yang dipilih
    
- rancangan frontend-admin mirip dengan frontend-user, dengan perbedaan seperti berikut
    * page utama: semua schedule harus muncul, selesai maupun belum
        + Schedule yang selesai memiliki tombol "tidak selesai" (seperti tombol X)
            - Jika ditekan, panggil API unfinish, dan schedule akan bisa diakses kembali oleh user

Kalau frontend udah selesai, bisa:
- Minta pull request ke repoku, cari google caranya