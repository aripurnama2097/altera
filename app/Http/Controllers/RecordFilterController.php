<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordFilterController extends Controller
{
    public function index(){

        $data = DB::table('records')->distinct('pso_date')
                ->pluck('pso_date');

        return view('recordsFilter.index', compact('data'));

        // $pso = DB::connection("mysql2")->table('t_file')->distinct('create_time');
        // $pso = $pso->orderBy('create_time','desc')->limit(100)->pluck('create_time');
        // return view('compare.index', compact('pso'));
    }
}
