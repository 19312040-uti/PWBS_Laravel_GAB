cara pakai repo ini:
1. install git dulu, di laptop (https://git-scm.com/download/win)
2. install ekstensi github sama git di vscode

kalo udah:
1. login github
2. di repo ini, bagian kanan atas, ada tombol "fork", klik
3. ikutin link ini https://www.petanikode.com/github-workflow/ (bagian "Fork & Clone repository")
4. fokus bagian forknya aja dulu

kalo udah fork,
1. ke akunmu di kanan atas -> "your repositories", pilih repo yang kamu fork barusan, namanya harusnya sama
2. klik tombol hijau yang tulisannya "<> code"
3. link https yang muncul dari situ copy
4. Buka terminal/cmd di folder yang mau kamu jadiin tempat project
5. di terminal/cmd, ketik: git clone link-https-yang-kamu-copy
    * Kadang kadang bakal diminta login, nanti dia buka aplikasi web buat login github
6. Jika ada perubahan di project lokal kamu, tinggal ketikkan git add . dan git commit -m "Pesan commit kamu". Lalu upload lagi: git push link-https-yang-kamu-copy main
7. Ulangi langkah 6 setiap ada perubahan yang ingin kamu upload ke GitHub

Kalau frontend udah selesai, WA, nanti kutambah cara Pull Request terus perubahanmu digabung sama repo ku