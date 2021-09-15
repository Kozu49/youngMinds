<?php

namespace App\Exports;

use App\Models\News;
use App\Models\User;
//use http\Client\Curl\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class NewsExport implements FromCollection,shouldAutoSize,WithMapping, WithHeadings,WithEvents,WithTitle
{
    use Exportable;
    /**
     * @var News $news
     */
    private $year;
    private $month;

    public function __construct(int $year, int $month)
    {
        $this->year=$year;
        $this->month=$month;

    }

    public function collection()
    {
        return News::with('user')
            ->whereYear('news_date',$this->year)
            ->whereMonth('news_date',$this->month)
            ->get();

    }

    public function map($news): array
    {
        return [
            $news->id,
            $news->title,
            $news->content,
            $news->news_date,
            $news->user->name,
            $news->created_at,
            $news->updated_at,

        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'Title',
            'Contents',
            'News Date',
            'User',
            'Created At',
            'Updated At'
        ];
    }

    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
        return [
            AfterSheet::class=>function(AfterSheet $news){
                $news->sheet->getStyle('A1:G1')->applyFromArray([
                   'font'=>[
                       'bold'=>true
                   ]
                ]);
            }
        ];
    }
    public function title(): string
    {

        // TODO: Implement title() method.
        return \DateTime::createFromFormat('!m',$this->month)->format('F');

    }
}
