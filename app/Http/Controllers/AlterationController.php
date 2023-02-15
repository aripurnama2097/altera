<?php

namespace App\Http\Controllers;


use App\Imports\AlterationsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alteration;


class AlterationController extends Controller
{
    public function index(){

        // $data_part= DB::connection("sqlsrv2")->table('stdPack')->distinct('partnumber')
        // ->whereRaw('year(input_date) > 2020')->pluck('partnumber');


        $data = DB::table('alterations')->orderBy('id', 'desc')->get();

        return view('alteration.index', compact('data'));
    }

    public function create(Request $request){

        alteration::create($request->all());

   
        
        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }

  

    public function importCSV(Request $request) 
    {
        

        // return request()->file('file');
        Excel::import(new AlterationsImport, request()->file('file'));


        return redirect()->back()->with('success', 'Upload Master Alteration Success');

    }

    public function deleteAll(Request $request){

        DB::table('alterations')->truncate();

        return redirect()->back()->with('delete', 'All records have been deleted.');
    }
}
