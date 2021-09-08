<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Jimmyjs\ReportGenerator\Facades\PdfReportFacade;
//use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;
//use Jimmyjs\ReportGenerator\Facades\PdfReportFacade;
use PdfReport;
use App\Models\News;


class ReportController extends Controller
{

    public function showReport(){
        $news=News::all();
        return view('backend.report.report',compact('news'));
    }

    public function searchReport(Request $request){
//dd($request->all());
        $validated = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
    $news=News::where('news_date','>=',$request->from_date)->where('news_date','<=',$request->to_date)->orderBy('news_date')->get();
        return view('backend.report.report',compact('news'));

    }

//    public function searchReport(Request $request){
////        dd($request->all());
//        $fromDate = $request->input('from_date');
//        $toDate = $request->input('to_date');
//
//        $title = 'Registered User Report'; // Report title
//
//        // For displaying filters description on header
//        $meta = [
//            'Registered on' => $fromDate . ' To ' . $toDate,
////            'Sort By'       => $sortBy
//        ];
//
//        // Do some querying..
//        $queryBuilder = News::select([
//            'title',
//            'news_date',
////            'registered_at'
//        ])
//            ->whereBetween('news_date', [
//                $fromDate,
//                $toDate
//            ]);
////            ->orderBy($sortBy);
//
//        // Set Column to be displayed
//        $columns = [
//            'Title' => 'title',
////            'Registered At',
//            // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
//            'News Date' => 'news_date',
////            'Status' => function ($result) { // You can do if statement or any action do you want inside this closure
////                return ($result->balance > 100000) ? 'Rich Man' : 'Normal Guy';
////            }
//        ];
//
//        /*
//            Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
//
//            - of()         : Init the title, meta (filters description to show), query, column (to be shown)
//            - editColumn() : To Change column class or manipulate its data for displaying to report
//            - editColumns(): Mass edit column
//            - showTotal()  : Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
//            - groupBy()    : Show total of value on specific group. Used with showTotal() enabled.
//            - limit()      : Limit record to be showed
//            - make()       : Will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
//        */
//
//        return PdfReport::of($title, $meta, $queryBuilder, $columns)
//            ->editColumn('News Date', [
//                'displayAs' => function ($result) {
//                    return $result->news_date->format('d M Y');
//                }
//            ])
//
//            ->limit(20)
//            ->stream(); // or download('filename here..') to download pdf
//    }


}
