<?php

namespace App\Imports;

use App\Tipo;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use App\Equipo;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TiposImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {
        if($row['tipo']<>null){
            $slug_tipo=Str::slug($row['tipo']);
            $tipo=Tipo::where('slug','=',$slug_tipo)->first();
            if(!$tipo){
                $tipo=Tipo::create([
                    'name'=>$row['tipo'],
                    'slug'=>$slug_tipo,
                ]);
            return $tipo;
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
