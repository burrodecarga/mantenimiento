<?php

namespace App\Imports;

use App\Insumo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;


class InsumosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $name=$row['name'];
        $slug=Str::slug($name);
       if(!Insumo::where('slug',$slug)->exists()){
        $precio=$row['precio'];
        $existencia=$row['existencia'];
           $n=is_numeric($precio);
           $n1= is_numeric($existencia);
       //dd($n,$n1,$precio,$existencia);
        $unidad=$row['unidad'];
        $description=$row['descripcion'];
        if($name && $precio && $n && $n1){
           return new Insumo([
           'name'=>$name,
           'precio'=>$precio,
           'unidad'=>$unidad,
           'existencia'=>$existencia,
           'description'=>$description,
           'slug'=>$slug,
        ]);}

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
