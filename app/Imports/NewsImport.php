<?php

namespace App\Imports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class NewsImport implements ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure
{
    use Importable,SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new News([
            'title'=>$row['title'],
            'content'=>$row['content'],
//            'news_date'=>date("Y-m-d", strtotime($row['news_date'])),
            'news_date'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['news_date']),
            'user_id'=>$row['user_id'],
            'slug'=>$row['slug'],
        ]);
    }
    public function rules(): array
    {
        return [
          '*.slug'=>['unique:news,slug']
        ];
    }


}
