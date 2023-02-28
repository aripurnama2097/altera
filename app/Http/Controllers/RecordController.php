<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RecordController extends Controller
{
    public function index(){

        $data = DB::table('records')->get();

        return view('records.index', 
        compact('data'));
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
