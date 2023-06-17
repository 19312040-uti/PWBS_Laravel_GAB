<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mscheduler extends Model
{
    //ambil semua schedule
    function viewSchedule() {
        $query = DB::table('tbl_schedule')
            ->join('tbl_user', 'tbl_schedule.Owner_ID', "=", "tbl_user.ID")
            ->select(
                "tbl_user.Username",
                "Title",
                "Description",
                "Due_Time",
                "Created_at"
            )
            ->orderBy("Owner_ID")
            ->get();
    
        return $query;
    }

    //ambil schedule user
    //pastikan user_id dalam bentuk BASE64
    function getSchedule($user_id) {
        $query = DB::table('tbl_schedule')
            ->select(
                "Title",
                "Description",
                "Due_Time",
                "Created_at"
            )
            ->where(DB::raw("TO_BASE64(Owner_ID)"), "=", $user_id)
            ->orderBy("Created_at")
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
    //pastikan schedule_id berbentuk BASE64
    function updateSchedule($schedule_id, $title, $description, $due_time) {
        DB::table("tbl_schedule")
            ->where(DB::raw("TO_BASE64(Schedule_ID)"), '=', $schedule_id)
            ->update([
                "Title" => $title,
                "Description" => $description,
                "Due_Time" => $due_time
            ]);
    }

    function deleteSchedule($schedule_id) {
        DB::table("tbl_schedule")
            ->where(DB::raw("TO_BASE64(Schedule_ID)"), '=', $schedule_id)
            ->delete();
    }
}
