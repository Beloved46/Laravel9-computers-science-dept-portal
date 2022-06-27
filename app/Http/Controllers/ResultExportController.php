<?php

namespace App\Http\Controllers;

use App\Exports\ResultExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ResultExportController extends Controller
{
    public function export_file(Excel $excel) {
       return $excel->download(new ResultExport, 'Result.pdf', Excel::DOMPDF);
    }
}
