<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DataTables\DataTables;


class RecordController extends Controller
{
    public function index(){

        $data = DB::table('records')->get();

        return view('records.index', 
        compact('data'));

        // return Datatable::of($data);

        // return DataTables::of($data)
        //     ->addColumn('rownum', function ($data) {
        //         static $i = 1;
        //         return $i++;
        //     })
        //     ->make(true);
    }



   
    public function filter(Request $request)
    {

        // $pagination =10; 
      
        // $date2 = $request->input('remark');

        $data = DB::table('records')
        ->where('status',$request->input('ok'))->get();
       
       
         return response()->json($data);
        //  ->with('i', (request()->input('page', 1) -1) * $pagination);   


        //  $filter_date = $request->input('filter_date');
        //  $items = Item::whereDate('created_at', $filter_date)->paginate(10);
        //  return view('items.index', compact('items'));
    }


    public function backup(Request $request){

   
        $dt1 = DB::table('records')
        ->select('doc_no', 'old_part_no','new_part_no','model','start_serial','running_date','wu','model_no','start_serial_pso','end_serial','pso_date','qty','lot_qty','start_date',
                 'end_date','smt_date','status','remark')
        ->where($request->all())->get();

        // return $dt1;

        foreach($dt1 as $value){
            $dt1 = DB ::table('backup')->insert(\get_object_vars($value));
        }

        //DELETE FROM RECORDS
        DB::table('records')->truncate();
        return redirect('records')->with('success', 'Data Berhasil di backup');

    }
    
}
