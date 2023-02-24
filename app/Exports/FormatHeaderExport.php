<?php

namespace App\Exports;

use App\Models\FormatHeader;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormatHeaderExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormatHeader::all();
    }

    public function headings(): array
    {
        return ["id","doc_no","old_part_no","new_part_no","model","start_serial", "running_date","wu"];
    }
}
