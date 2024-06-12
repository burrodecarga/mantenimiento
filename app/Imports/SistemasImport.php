<?php

namespace App\Imports;

use App\Sistema;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SistemasImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {
            if($row['sistema']<>null)
            {
                    $sistema=Sistema::where('name','=',$row['sistema'])
                                    ->get();
                    if($sistema->isEmpty())
                    {
                            Sistema::create([
                            'name' => $row['sistema'],
                            'description' => $row['descripcion'],
                            'slug'=>Str::slug($row['sistema']),]);
                    }else{
                        $row->skip(1);
                    }
            }

        }
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function startRow(): int
        {
            return 2;
        }
}
