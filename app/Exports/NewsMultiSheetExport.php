<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class NewsMultiSheetExport implements WithMultipleSheets
{
    private $year;

    public function __construct(int $year)
    {
        $this->year=$year;
    }

    public function sheets():array
    {
        $news=[];
        for ($month=1;$month<=12;$month++){
            $news[]=new NewsExport($this->year,$month);
        }
        return $news;
    }
}
