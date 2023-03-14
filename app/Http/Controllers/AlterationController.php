<?php

namespace App\Http\Controllers;


use App\Imports\AlterationsImport;
use App\Exports\FormatHeaderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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

    public function export(){

        $date = Carbon::now()->format('Y-m-d');
        $filename = 'Format_Header' . $date . '.csv';
       
        return Excel::download(new FormatHeaderExport, $filename, \Maatwebsite\Excel\Excel::CSV);
    
    }

    public function destroy($id)
    {
        $model=Alteration::find($id);
        $model->delete();// METHOD DELETE
        return redirect('/alteration')->with('success', 'Success! Data Berhasil Dihapus');
    }

    public function update(Request $request, $id)
    {

        $model = Alteration::find($id);   

        $model->doc_no      = $request->doc_no;
        $model->old_part_no = $request->old_part_no;
        $model->new_part_no = $request->new_part_no;
        $model->model       = $request->model;
        $model->start_serial= $request->start_serial;
        $model->running_date= $request->running_date;
        $model->wu          = $request->wu;
        $model->save();
        
        return redirect('/alteration')->with('success', 'Success! Data Berhasil Diupdate');
    }

}
