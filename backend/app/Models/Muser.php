<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Muser extends Model
{
    function viewUsername() {
        
    }

    function getUsername() {
        
    }
    function addUsername() {
        
    }
    function updateUsername() {
        
    }

    function deleteUsername($user_id) {
        //convert user_id to base64 in the controller
        DB::table("tbl_user")
        ->where(DB::raw("TO_BASE64(ID)"), '=', $user_id)
        ->delete();
    }


}
