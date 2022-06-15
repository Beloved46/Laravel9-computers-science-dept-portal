<?php

namespace App\Http\Controllers;

use App\Imports\ResultImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResultImportController extends Controller
{
    public function show() {
        return view('department.result_import');
    }

    public function import_file(Request $request) {

       $file = $request->file('result_file')->store('imports');
       (new ResultImport)->import($file);
        //    (new ResultImport)->import($file);
        // $path=storage_path('app').'/'.$file;
        // Excel::import(new ResultImport, $file);
    
       return back()->withStatus('file uploaded successfully');
    }
}
