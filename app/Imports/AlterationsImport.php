<?php

namespace App\Imports;

use App\Models\alteration;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class AlterationsImport implements ToModel,WithHeadingRow
{
 


    public function model(array $row)
    {

        // $running_date= date_create($row['running_date']);

        // date_add( $running_date, date_interval_create_from_date_string($row['running_date']));
// 
        // $newDate = date("Y-m-d", strtotime($running_date));
        // $running_date= date_format($running_date,'Y-m-d');

        // return $dataRunning;

        // $rows = [];
        // foreach ($row as $key => $value) {
        //     if($value == "~"){
        //         $value = NULL;
        //     }
        //     if($key == "running_date"){
        //         $value = date_create($value);
        //         $value = date_format($value,"Y-m-d");
        //     }
        //     $rows[$key] = $value;
        // }


        $data = new alteration([
           'doc_no'         => "{$row['doc_no'      ]}",
           'old_part'       => "{$row['old_part'    ]}",
           'new_part'       => "{$row['new_part'    ]}",
           'model'          => "{$row['model'       ]}",
           'start_serial'         => "{$row['serial'      ]}",
           'running_date'   => "{$row['running_date']}",
           'wu'             => "{$row['wu'          ]}",
        ]);


        return $data;
    }
   
}
