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


        $data = DB::table('alterations')->get();
        return view('alteration.index', compact('data'));
    }

    public function create(Request $request){

        alteration::create($request->all());

        return $request;
    
        
        return redirect('/alterations')->with('success', 'Success! Data Berhasil Disimpan');;
    }

  

    public function importCSV(Request $request) 
    {
        

        // return request()->file('file');
        Excel::import(new AlterationsImport, request()->file('file'));


        return redirect('/alteration')->with('success', 'Upload Master Alteration Success');
        
        // $request->validate([
        //     'file' => 'required|mimes:csv,txt',
        // ]);

        // $file = $request->file('file');

        // return $file;

        // Excel::import(new AlterationsImport, 'users.xlsx');


    }
}
