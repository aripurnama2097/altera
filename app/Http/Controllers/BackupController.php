<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BackupController extends Controller
{
    public function index(){

        $data = DB::table('backup')->get();

        return view('backup.index', compact('data'));
    }
}
