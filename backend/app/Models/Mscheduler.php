<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mscheduler extends Model
{
    function viewSchedule($user_id) {
        $user_id = base64_decode($user_id);

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

    function getSchedule() {
        
    }

    function createSchedule() {
        
    }

    function updateSchedule() {
        
    }

    function deleteSchedule() {
        
    }
}
