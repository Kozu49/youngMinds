<?php

namespace App\Http\Controllers;
//use App\Exports\UsersExport;
use App\Exports\NewsExport;
use App\Imports\NewsImport;
use App\Exports\NewsMultiSheetExport;
use App\Models\News;
use Maatwebsite\Excel\Excel;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use function GuzzleHttp\Promise\all;

class ExcelCSVController extends Controller
{

    public function show(){
            return view('backend.report.import');

    }

    public function importExcelCSV(Request $request,Excel $excel){

        $file=$request->file('file');

//        $excel->import(new NewsImport,$file);
        $import=new NewsImport;
        $import->import($file);
//        dd($import->failures()[0]->errors());

            if ($import->failures()->isNotEmpty()){
                return back()->withFailures($import->failures());
            }
        return back()->withStatus('Excel File imported Sucessfully');

    }


    public function exportExcelCSV(Excel $excel)
    {

        return $excel->download(new NewsMultiSheetExport(2021), 'news.xlsx');
    }

}
