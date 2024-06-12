<?php

namespace App\Imports;

use App\Repuesto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;


class RepuestosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $name=$row['name'];
        $marca=$row['marca'];
        $slug=Str::slug($name);
       if(!Repuesto::where('slug',$slug)->exists()){
        $precio=$row['precio'];
        $existencia=$row['existencia'];
           $n=is_numeric($precio);
           $n1= is_numeric($existencia);
       //dd($n,$n1,$precio,$existencia);
        $proveedor=$row['proveedor'];
        $description=$row['descripcion'];
        if($name && $precio && $n && $n1){
           return new Repuesto([
           'name'=>$name,
           'precio'=>$precio,
           'proveedor'=>$proveedor,
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
