<?php

namespace App\Http\Controllers;

use App\Models\Mscheduler;
use Illuminate\Http\Request;

class scheduler extends Controller
{

    function __construct() {
        $this->model = new Mscheduler();
    }
    function createAccount() {
        
    }
}
