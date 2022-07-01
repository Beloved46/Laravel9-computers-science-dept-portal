<?php

namespace App\Imports;

use App\Models\Result;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class ResultImport implements
    ToCollection,
    WithCustomCsvSettings,
    SkipsOnError, 
    WithValidation,
    SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    *@param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $result = Result::create([
                'course_code' => $row[0],
                'matric_no' =>$row[1],
                'score' => $row[2],
                'grade' =>$row[3]
            ]);
        }
    }
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1'
        ];
    }
    public function rules(): array
    {
        return [
            '*.matric_no' => ['nullable', 'integer', 'starts_with:22']
        ];
    }
    public function onError(Throwable $e)
    {
        
    }
   
}
