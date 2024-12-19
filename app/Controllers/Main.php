<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Main extends Controller
{
    public function index()
    {
        return view('cau');
    }
}