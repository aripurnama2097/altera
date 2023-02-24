<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Compare;

class CompareController extends Controller
{
    public function index(){

        // $pso= DB::connection("mysql2")->table('t_file')->distinct('create_time')
        // ->whereRaw('year(input_date) > 2022')->pluck('create_time');
        // ->orderBy('create_time','desc');

        $pso = DB::connection("mysql2")->table('t_file')->distinct('create_time');
        $pso = $pso->orderBy('create_time','desc')->limit(100)->pluck('create_time');
        return view('compare.index', compact('pso'));
    }


    public function startCompare(Request $request){

       
        $create_time = $request->create_time;
      
        // $result =  Compare::where('create_time','=', $create_time)
        //     // ->join('database.alterations as b')
        //     ->select(DB::raw('create_time', 'qty'))->get();

        // $result = DB::connection('mysql2')
        //             // ->join('mysql2.t_file', 'alterations.model', '=', 't_file.model_no')
        //             ->select("SELECT distinct start_date, qty,create_time where create_time =  '{$create_time}'
        //             LIMIT 100");

        // $users = DB::table('users') 
        //     ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        //     ->get();
        // DB::table('table1')
        // ->insertUsing(['column1', 'column2'], function($query){
          

           $result = DB::connection('mysql')->select( "INSERT into altera.records (doc_no,old_part_no,new_part_no,model,start_serial,running_date,wu,model_no,start_serial_pso,end_serial,pso_date,qty,lot_qty,start_date,end_date,smt_date)
                            SELECT B.doc_no, B.old_part_no, B.new_part_no, B.model, B.start_serial, B.running_date,B.wu,
                            T.model_no,  T.start_serial, T.end_serial, T.pso_date,X.qty,X.lot_qty,X.start_date,X.end_date,DATE_ADD(X.start_date, INTERVAL -7 DAY) as smt_date 
                            from 
                            (SELECT distinct model_no, start_serial,sum(start_serial+qty) as end_serial,create_time as `pso_date` FROM db_pso.t_file
                            where create_time = '{$create_time}'
                            group by model_no, start_serial
                            order by model_no asc) as T
                            left join db_pso.t_file X on X.model_no = T.model_no and X.start_serial = T.start_serial and X.create_time = T.pso_date 
                            inner join altera.alterations B on model = T.model_no and T.start_serial <= B.start_serial and T.end_serial >= B.start_serial  
                            order by id asc");


            return redirect('/compare')->with('success', 'COMPARE DATA SUCCESS, CHECK RECORD MENU');
        
            // if('status'== NULL){
            //     $data = connection('mysql')
            //     ->where('status', '=''ok')
            //     get();
            // }
        
        
        // });
        // INSERT INTO altera.records (id, doc_no, old_part_no, new_part_no, model, start_serial, running_date,wu,model_no,
        // start_serial_pso, end_serial, pso_date, qty,lot_qty, start_date,end_date, smt_date) 

        // return $query;
        // return redirect()->back()->with('success', 'Success Compare');
        // return view('/compare', compact('query'));

    //     $start_date = 'start_date';
    //     $running_date = 'running_date';

    //     if($start_date != $running_date){
    //             DB::table('compares')->insert([        
    //                 'status'    => $update,
            
    //         ]);
    //    }

    

    }
}
