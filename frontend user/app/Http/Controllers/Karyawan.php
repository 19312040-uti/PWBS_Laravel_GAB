<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jadwal extends Controller
{
    function __construct()
    {
        $this->client = new \GuzzleHttp\Client();

    }

    // Buat Fungsi index
    function index()
    {


        // untuk get dari data server
        $url = env("API_URL")."view";
        // echo $url;

        // ambil service "get" dari server
        $request = $this->client->get($url);

        // menampilkan hasil
        $response = $request->getBody();



        $data["result"] = json_decode($response);



        return view("vw_jadwal",$data);
    }

    // fungsi untuk hapus data
    function delete($parameter)
    {
        $kode = base64_encode($parameter);
        // url untuk delete dari data server
        $url = env("API_URL")."delete/". $title;

        // ambil service "delete" dari server
        $request = $this->client->delete($url);

        // menampilkan hasil dari delete server
        $response = $request->getBody();


        echo $response;
    }

    function add()
    {

        return view("en_jadwal");
    }

    // buat fungsi untuk simpan data
    function insert(Request $req)
    {
        // untuk post data ke server
        $url = env("API_URL")."insert";

        // ambil service "post" dari server
        $request = $this->client->post($url,[
            "form_params" => [
                "title" => $req->title,
                "description" => $req->desc,
                "duetime" => $req->duetime,

            ]
        ]);

        // menampilkan hasil dari post server
        $response = $request->getBody();


        echo $response;
    }

    // fungsi untuk halaman update data
    function update($parameter)
    {
        // untuk get dari data server (detail)
        $url = env("API_URL")."detail/".$parameter;
        // echo $url;

        // ambil service "get" dari server
        $request = $this->client->get($url);

        // menampilkan hasil
        $response = $request->getBody();

        // tampilkan data
        foreach (json_decode($response)->jadwal as $hasil) {
            $data = [
                "title" => $hasil->title,
                "description" => $hasil->desc,
                "duetime" => $hasil->duetime,
                "title_lama" => $parameter,
            ];
        }

        // tampilkan view
        return view("up_jadwal",$data);
    }
}
