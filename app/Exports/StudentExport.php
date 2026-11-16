<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Model\AssignStudent;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;

class StudentExport implements FromView
{
    protected $pdata;

    public function __construct(array $pdata)
    {
        $this->pdata = $pdata;
    }

    public function view(): View
    {
        return view('backend.student.registration.excel.student_report_excel', [
            'pdata' => $this->pdata
        ]);
    }
}
