<?php

namespace App\Http\Controllers;

use App\Models\Mscheduler;
use Illuminate\Http\Request;

class Scheduler extends Controller
{

    function __construct() {
        $this->model = new Mscheduler();
    }
    function createAccount() {
        
    }

    function getAccount($loginfo) {
        
    }
}
