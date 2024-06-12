<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use App\Tipoc;
use App\Parametro;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CaracteristicasImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        //dd($_POST);
        if($row['name']<>null){
            $tipo_id=$_POST['tipo_id'];

            $slug_tipoc=Str::slug($row['name']);
            $tipoc=Tipoc::where('slug','=',$slug_tipoc)
                        ->where('tipo_id','=',$tipo_id)
                        ->first();
            $parametro=Parametro::where('slug','=',$slug_tipoc)->first();
            $parametro_id=0;
            if(!is_null($parametro)){
               $parametro_id=$parametro->id;
            } else{
                $parametro=Parametro::create([
                    'name'=>mb_strtolower($row['name']),
                    'slug'=>Str::slug($row['name']),
                    'valor'=>'por definir',
                    'unidad'=>'por definir',
                    'description'=>'por definir',
                ]);
                $parametro_id=$parametro->id;
            }

            if(is_null($tipoc)){
                $unidad=Str::slug($row['unidad']);
                $valor=Str::slug($row['valor']);
               return $tipoc= Tipoc::create([
                    'name'=>$row['name'],
                    'slug'=>$slug_tipoc,
                    'valor'=>$valor,
                    'unidad'=>$unidad,
                    'tipo_id'=>$tipo_id,
                    'parametro_id'=>$parametro_id,
                ]);

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
