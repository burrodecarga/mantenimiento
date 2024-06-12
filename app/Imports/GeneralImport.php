<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use App\Sistema;
use App\Subsistema;
use App\Tipo;
use App\Equipo;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GeneralImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        if($row['sistema']<>null AND $row['subsistema']<>null  AND $row['equipo']<>null){

            $slug_sistema=Str::slug($row['sistema']);
            $sistema=Sistema::where('slug','=',$slug_sistema)->first();
            if(is_null($sistema)){

                $sistema= Sistema::create([
                    'name'=>$row['sistema'],
                    'slug'=>$slug_sistema,
                ]);

            }



            $slug_subsistema=Str::slug($row['subsistema']);
            $subsistema=Subsistema::where('slug','=',$slug_subsistema)->first();

            if(is_null($subsistema)){
                $subsistema= Subsistema::create([
                    'sistema'=>$sistema->name,
                    'sistema_id'=>$sistema->id,
                    'name'=>$row['subsistema'],
                    'slug'=>$slug_subsistema,
                ]);
            }



            $name=$row['equipo'];
            $slug=Str::slug($name);

            $slug_tipo=Str::slug($row['tipo']);
            $tipo=Tipo::where('slug','=',$slug_tipo)->first();
            if(is_null($tipo)){
                $tipo=Tipo::create([
                    'name'=>$row['tipo'],
                    'slug'=>$slug_tipo,
                ]);
            }

            $tname=$tipo->name;
            $tid=$tipo->id;



           $validador=$subsistema[0]['id'].'-'.$subsistema->name;
           $description=$row['descripcion'];
           $ubicacion=$row['ubicacion'];
           $servicio=$row['servicio'];
           if($servicio==null){$servicio=10;}


            return Equipo::create([
            'sistema'     => $sistema->name,
            'sistema_id'  => $sistema->id,
            'subsistema'  => $subsistema->name,
            'subsistema_id'  => $subsistema->id,
            'name'  => $name,
             'tipo'  => $tname,
            'tipo_id'  => $tid,
            'validador'  => $validador,
            'description'  => $description,
            'slug'  => $slug,
            'ubicacion'=>$ubicacion,
            'servicio'=>$servicio,
        ]);
        }


    }

    public function headingRow(): int
    {
        return 1;
    }
}
