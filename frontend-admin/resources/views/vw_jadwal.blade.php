@extends('main_tamplate')

@section('title_tamplate')
    <title>Schedule</title>
@endsection

@section('body_tamplate')

    <body class="m-5">
        {{-- buat navigasi --}}
        <nav class="text-center mb-5">
            <button id="btn_tambah" class="bg-teal-600 h-12 w-28 rounded-full text-white uppercase font-bold"
                onclick="gotoAdd()">Add</button>
            <button id="btn_refresh"
                class="bg-stone-200 h-12 w-28 rounded-full text-teal-600 uppercase font-bold">Refresh</button>
        </nav>
        {{-- buat table --}}
        <table class="w-full">
            {{-- judul table --}}
            <thead>
                <tr class="h-12">
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-1/12">Edit/Delete</th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-1/12">Title</th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-2/12">Description</th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-3/12">Due Time </th>



                </tr>
            </thead>

            {{-- isi table --}}
            <tbody>
                @foreach ($result->jadwal as $output)
                    <tr>
                        <td class="border-solid border-2 border-teal-600 bg-transparent text-center px-2.5">
                            <button id="btn_ubah" class="bg-sky-600 text-white w-10 h-8 rounded-lg"
                                onclick="gotoUpdate('{{ base64_encode($output->title) }}')"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button id="btn_hapus" class="bg-red-600 text-white w-10 h-8 rounded-lg"
                                onclick="gotoDelete('{{ $output->title }}')"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent text-center px-2.5">
                            {{ $output->title }}</td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent px-2.5">{{ $output->desc }}
                        </td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent px-2.5">
                            {{ $output->duetime }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>


        {{-- Custom JS --}}
        <script>
            // Buat Fungsi Untuk Link Tambah Data
            function gotoAdd() {
                location.href = '{{ url('/add') }}';
            }

            // Buat Fungsi Untuk Btn Refresh
            document.getElementById("btn_refresh").addEventListener('click', function() {
                location.href = '{{ url('') }}'
            })

            // fungsi untuk link ke halaman ubah data
            function gotoUpdate(title) {
                location.href = '{{ url('/update') }}/' + title;
            }

            // fungsi untuk link hapus data
            function gotoDelete(title) {
                if (confirm("Title : " + title + " Ingin Dihapus ?") === true) {
                    // panggil fungsi "deleteData"
                    deleteData(kode)
                }
                // else {
                //     alert("Tombol Cancel")
                // }
            }

            function deleteData(kode) {
                const url = '{{ url('/delete') }}/' + title;



                // proses async (fetch)
                fetch(url, {
                        method: "DELETE",
                        headers: {
                            'X-CSRF-Token': document.querySelector('meta[name="_token"]').content
                        }

                    })


                    // ini untuk membaca respon dari fetch
                    .then((respons) => respons.json())

                    // yang ini untuk menampilkan hasil dari then sebelumnya
                    .then((result) => {
                        alert(result.pesan)
                        document.querySelector("#btn_refresh").click()
                    }) // kurung kurawal {} menandakan adanya lebih dari satu proses

                    // jika terjadi error dari pada saat fetch data
                    .catch((error) => alert("Data gagal dikirim"))
            }
        </script>


    </body>
@endsection

{{-- note

    syncronus
    metodenya pararel dikerjakan berunut dari a hingga z

    asyncronus
    metodenya seri dekerjakan bersamaan
        fetch merupakan salah satu proses asyncronus

--}}
