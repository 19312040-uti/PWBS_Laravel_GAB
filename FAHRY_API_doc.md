baca dan ikuti FAHRY_github_doc.md dulu

Dokumentasi Database
Database cuman ada 1 table, tbl_schedule
+ isi data: 
    - "Schedule_ID", INT, Primary key, auto increment (mirip id di db_pwbs)
        * Untuk primary key database

    - "Title", text
        * Untuk judul schedule

    - "Description", text, nullable (boleh null/kosong)
        * Untuk deskripsi schedule, boleh kosong

    - "Due_Time", timestamp, nullable (boleh null/kosong)
        * Waktu schedule selesai, boleh kosong
        * Waktu dikirim dalam format angka TAHUN-BULAN-TANGGAL JAM:MENIT:DETIK

    - "Created_at", timestamp, default value (biarkan kosong, ada nilai tersendiri)
        * Waktu schedule dibuat, biarkan kosong ketika insert

    - "Finished", boolean, default value (biarkan kosong)
        * Status selesai schedule, 
            - 0 belum selesai (muncul pada UI user dan admin) 
            - 1 selesai (tidak muncul pada UI user, hanya pada UI admin)

Dokumentasi API
API ada 8, diurut berdasarkan CRUD (Create, Read, Update, Delete)
Mayoritas struktur API mirip projek PWBS, kalo butuh referensi file PWBS minta yang lain (punyaku gk komplit)

+ Create (POST)
    - /api/schedules/create
        * API untuk create schedule baru, mirip '/insert' di api pwbs
        * Proses dibuat di frontend-user dan frontend-admin (copas frontend-user aja)
    
+ Read (GET)
    - /api/schedules/view
        * API untuk membaca schedule user
            - Schedule yang status finishnya 1 tidak akan muncul
    
    - /api/schedules/view/all
        * API untuk membaca semua schedule
            - Digunakan untuk akses admin
    
    - /api/schedules/view/{schedule_id}
        * API untuk membaca schedule tertentu
            - Query memberikan semua data tabel dalam bentuk data bernama "Schedule"
            - Parameter {schedule_id} meminta nomor dari field "Schedule_ID"
    
+ Update (PUT)
    - /api/schedules/update/{updateData}
        * API untuk update schedule
            - Mirip seperti api update pada PWBS
            - Parameter {updateData} meminta Request dari frontend
    
    - /api/schedules/update/finish/{schedule_id}
        * API untuk mengubah status schedule menjadi selesai (1)
            - Schedule akan hilang dari view user
    
    - /api/schedules/update/unfinish/{schedule_id}
        * API untuk mengubah status schedule menjadi tidak selesai (0)
            - Digunakan pada UI admin untuk memunculkan schedule kembali

+ Delete (DELETE)
    - /api/schedules/delete/{schedule_id}
        * API untuk menghapus schedule dari database
            - Hanya dapat digunakan pada UI admin
