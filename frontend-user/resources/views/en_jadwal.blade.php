@extends('main_tamplate')

@section('title_tamplate')
    <title>Tambah Jadwal</title>
@endsection

@section('body_tamplate')

    <body class="m-5">
        {{-- section utama --}}
        <section class="flex flex-col">
            {{-- section untuk baris pertama --}}
            <section class="flex w-full mb-4">
                {{-- section untuk judul --}}
                <section class="flex-auto w-1/2 mr-4">
                    <section>
                        <label for="txt_title" id="lbl_title">Nik</label>
                    </section>
                    <section>
                        <input type="text" name="txt_title" id="txt_title" maxlength="10"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>
                    <section>
                        <label for="" id="err_title" class="text-rose-500 ">
                            <i class="fa-solid fa-circle-exclamation mr-2.5"></i> Judul Harus Diisi.</label>
                    </section>
                </section>

                {{-- section untuk deskripsi --}}
                <section class="flex-auto w-1/2 ">
                    <section>
                        <label for="txt_desc" id="lbl_desc">Nama</label>
                    </section>
                    <section>
                        <input type="text" name="txt_desc" id="txt_desc" maxlength="50"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>
                    <section>
                        <label for="" id="err_desc" class="text-rose-500">
                            <i class="fa-solid fa-circle-exclamation mr-2.5"></i> Deskripsi Harus Diisi.</label>
                    </section>
                </section>
            </section>

            {{-- section untuk baris kedua --}}
            <section class="flex w-full mb-4">

                <section class="flex-auto w-1/2 mr-4">
                    <section>
                        <label for="txt_duetime" id="lbl_duetime">alamat</label>
                    </section>
                    <section>
                        <input type="text" name="txt_duetime" id="txt_duetime" maxlength="100"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>


            {{-- Area Tombol --}}
            <section class="flex w-full mb-4">

                <section class="flex-auto w-full">
                    <button id="btn_simpan" class="bg-teal-600 h-12 w-28 rounded-full text-white uppercase font-bold" onclick="save()">
                        Simpan
                    </button>
                    <button id="btn_batal" class="bg-stone-200 h-12 w-28 rounded-full text-teal-600 uppercase font-bold">
                        Batal
                    </button>
                </section>
            </section>
        </section>

        {{-- Custom JS --}}
        <script>
            // hilangkan pesan error
            document.querySelector("#err_title").style.display = 'none'
            document.querySelector("#err_desc").style.display = 'none'
            document.querySelector("#err_duetime").style.display = 'none'




            // fungsi "btn_batal"
            document.querySelector("#btn_batal").addEventListener("click", function () {
                location.href="{{ ('/') }}"
            })

            // fungsi "btn_simpan"
            const save = () => {

                // Ternary Computer
                const title = document.querySelector("#txt_title").value === "" ?
                // hasil jika kondisi benar
                [
                    // tampilkan error title
                    document.querySelector("#err_title").style.display = 'unset',
                    // Ubah class "txt_nik"
                    document.querySelector("#txt_tile").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_title = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_title
                    document.querySelector("#err_title").style.display = 'none',

                    document.querySelector("#txt_title").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_title = 0
                ]

                const desc = document.querySelector("#txt_desc").value === "" ?
                // hasil jika kondisi benar
                [
                    // tampilkan error desc
                    document.querySelector("#err_desc").style.display = 'unset',
                    // Ubah class "txt_desc"
                    document.querySelector("#txt_desc").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_desc = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_desc
                    document.querySelector("#err_desc").style.display = 'none',

                    document.querySelector("#txt_desc").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_desc = 0
                ]

                const duetime = document.querySelector("#txt_duetime").value === "" ?
                // hasil jika kondisi benar
                [
                    // tampilkan error duetime
                    document.querySelector("#err_duetime").style.display = 'unset',
                    // Ubah class "txt_duetime
                    document.querySelector("#txt_duetime").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_duetime = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_duetime
                    document.querySelector("#err_duetime").style.display = 'none',

                    document.querySelector("#txt_duetime").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_duetime = 0
                ]



                // jika seluruh komponen sudah diisi
                const check = (title[2] === 0 && desc[2] === 0 && duetime[2] === 0 ) ?
                // proses simpan data (panggil fungsi saveData)
                    saveData(document.querySelector("#txt_title").value, document.querySelector("#txt_desc").value,
                    document.querySelector("#txt_duetime").value)
                :
                ""
            }

            // buat fungsi save data (Metode async/await)
            const saveData = async(title, desc, duetime) => {
                // Collecting data
                let data = {
                    "title" : title,
                    "description" : desc,
                    "duetime" : duetime,

                }
                // proses kirim data
                try {

                    let response = await fetch("{{url('/insert')}}",{
                        method: "POST",
                        headers: {
                            'Content-type':'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="_token"]').content
                        },
                        body:JSON.stringify(data)
                    })
                    // baca hasil dari controller
                    let result = await response.json()
                    alert(result.pesan)

                } catch (error) {
                    alert("Data Gagal Dikirim !")
                }
            }
        </script>
    </body>
@endsection
