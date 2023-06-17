<?php

namespace App\Http\Controllers;

use App\Models\Mscheduler;
use Exception;
use Illuminate\Http\Request;

class Scheduler extends Controller
{

    function __construct() {
        $this->model = new Mscheduler();

        //cek apakah ada schedule yang sudah melewati batas waktu
    }

    //Tampilkan semua data scheduler
    function viewAsUser() {
        //ambil fungsi viewSchedule (Mscheduler)
        $data = $this->model->viewScheduleAsUser();

        //tampilkan
        return response([
            "Schedule" => $data
        ], http_response_code());
    }

    function view() {
        //ambil fungsi viewSchedule (Mscheduler)
        $data = $this->model->viewSchedule();

        //tampilkan
        return response([
            "Schedule" => $data
        ], http_response_code());
    }


    function get($schedule_id) {
        //ambil fungsi getSchedule (Mscheduler)
        $data = $this->model->getSchedule($schedule_id);

        //tampilkan
        return response([
            "Schedule" => $data
        ], http_response_code());
    }

    //Buat schedule baru
    function create(Request $create) {
        //ambil data dari page create
        $data = array(
            "user_id" => $create->user_id,
            "title" => $create->title,
            "description" => $create->description,
            "due_time" => $create->due_time
        );

        //ambil fungsi createSchedule (Mscheduler)
        //coba simpan schedule
        try{
            $this->model->createSchedule($data["user_id"], $data["title"], $data["description"], $data["due_time"]);

            //Jika schedule berhasil disimpan
            $status = 1;
            $pesan = "Schedule Berhasil Ditambahkan";
        } catch(Exception $e){
            //Jika schedule gagal disimpan
            $status = 0;
            $pesan = "Schedule Gagal disimpan!";
        }

        //tampilkan
    }

    //Perbaharui schedule
    function update(Request $update) {
        //ambil data dari page update
        $data = array(
            "schedule_id" => $update->schedule_id,
            "title" => $update->title,
            "description" => $update->description,
            "due_time" => $update->due_time
        );

        //ubah data
        //ambil fungsi updateSchedule (Mscheduler)
        try{
            $this->model->updateSchedule(
                $data["schedule_id"],
                $data["title"],
                $data["description"],
                $data["due_time"]
            );
    
            //Jika update berhasil
            $status = 1;
            $pesan = "Schedule telah diperbaharui";
        } catch(Exception $e) {
            //Jika update gagal
            $status = 0;
            $pesan = "Schedule gagal diperbaharui!";
        }
        
    }

    //Jadikan schedule sebagai "selesai" (dihilangkan untuk user)
    function finish($schedule_id) {
        //coba ganti status schedule
        try {
            $data = $this->model->setScheduleStatus($schedule_id, 1);

            //Jika pergantian status berhasil
            $status = 1;
            $pesan = "Schedule selesai";
        } catch (Exception $e) {

            //Jika pergantian status gagal
            $status = 1;
            $pesan = "Status schedule gagal diganti";
        }
    }

    //Jadikan schedule sebagai "belum selesai" (dihilangkan untuk user)
    function unfinished($schedule_id) {
        //coba ganti status schedule
        try {
            $data = $this->model->setScheduleStatus($schedule_id, 0);

            //Jika pergantian status berhasil
            $status = 1;
            $pesan = "Schedule dikembalikan";
        } catch (Exception $e) {

            //Jika pergantian status gagal
            $status = 1;
            $pesan = "Status schedule gagal diganti";
        }
    }


    function delete($schedule_id) {
        //Cek jika schedule masih ada
        $data = $this->model->getSchedule($schedule_id);

        //jika data ditemukan
        if (count($data) != 0) {
            //lakukan penghapusan data
            //ambil fungsi deleteSchedule (Mscheduler)
            $this->model->deleteSchedule($schedule_id);

            //Jika penghapusan berhasil
            $status = 1;
            $pesan = "Schedule dihapus";
        } 
        //Jika data tidak ditemukan
        else {
            $status = 0;
            $pesan = "Schedule gagal dihapus!";
        }
    }
}
