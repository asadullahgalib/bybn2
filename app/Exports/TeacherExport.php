<?php

namespace App\Exports;
use App\Model\Teacher;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\FromCollection;

class TeacherExport implements FromView
{
    protected $pdata;

    public function __construct(array $pdata)
    {
        $this->pdata = $pdata;
    }

    public function view(): View
    {
        return view('backend.setups.teacher.excel.teacher_report_excel', [
            'pdata' => $this->pdata
        ]);
    }
}
