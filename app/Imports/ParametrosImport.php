<?php

namespace App\Imports;

use App\Parametro;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParametrosImport implements ToCollection, WithHeadingRow
{


    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {

            if($row['parametro']<>null)
            {
               $parametro=Parametro::where('name','=',$row['parametro'])->get();
                if($parametro->isEmpty()){
                 $slug=Str::slug($row['parametro']);
                 Parametro::create([
                'name' =>$row['parametro'],
                'valor' =>$row['valor'],
                'unidad' =>$row['unidad'],
                'description' =>$row['descripcion'],
                'slug' =>$slug,
            ]);
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


}
