<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mscheduler extends Model
{
    //ambil semua schedule yang aktif (akses user)
    function viewScheduleAsUser() {
        $query = DB::table('tbl_schedule')
            ->select(
                "Title",
                "Description",
                "Due_Time",
                "Created_at",
                "Finished AS Finished_Status"
            )
            ->where("Finished", 0)
            ->orderBy("Created_at")
            ->get();
    
        return $query;
    }

    //ambil semua schedule (aktif dan tidak aktif) (akses admin)
    function viewSchedule() {
        $query = DB::table('tbl_schedule')
            ->select(
                "Schedule_ID",
                "Title",
                "Description",
                "Due_Time",
                "Created_at",
                "Finished AS Finished_Status"
            )
            ->orderBy("Created_at")
            ->get();
    
        return $query;
    }

    //ambil schedule tertentu
    function getSchedule($schedule_id) {
        $query = DB::table('tbl_schedule')
            ->select(
                "Title",
                "Description",
                "Due_Time",
                "Created_at"
            )
            ->where("Schedule_ID", $schedule_id)
            ->get();
    
        return $query;
    }

    function createSchedule($user_id, $title, $description, $due_time) {
        DB::table("tb_schedule")
            ->insert([
                "Owner_ID" => $user_id,
                "Title" => $title,
                "Description" => $description,
                "Due_Time" => $due_time
            ]);
    }

    //fungsi update schedule pengguna
    function updateSchedule($schedule_id, $title, $description, $due_time) {
        DB::table("tbl_schedule")
            ->where("Schedule_ID", '=', $schedule_id)
            ->update([
                "Title" => $title,
                "Description" => $description,
                "Due_Time" => $due_time
            ]);
    }

    //fungsi untuk mengubah status selesai schedule
    function setScheduleStatus($schedule_id, $status) {
        DB::table("tbl_schedule")
            ->where('Schedule_ID', '=', $schedule_id)
            ->update([
                "Due_Time" => null,
                "Finished" => $status
            ]);
    }

    function deleteSchedule($schedule_id) {
        DB::table("tbl_schedule")
            ->where("Schedule_ID", '=', $schedule_id)
            ->delete();
    }
}
