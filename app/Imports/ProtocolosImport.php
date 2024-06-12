<?php

namespace App\Imports;

use App\Protocolo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use App\Tipo;

class ProtocolosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tipoEquipo=$row['tipo_de_equipo'];

        $tipoTarea=$row['tipo_de_tarea'];
        $tarea=$row['tarea'];
        $protocolo=$row['protocolo'];
        $frecuencia=$row['frecuencia'];
        $duracion=$row['duracion'];
        $permisos=$row['permisos'];
        $seguridad=$row['seguridad'];
        $condiciones=$row['condiciones'];
        $descripcion=$row['descripcion'];

        if($tipoEquipo && $tipoTarea && $tarea && $protocolo && $frecuencia && $duracion && $permisos && $seguridad && $condiciones){
            $slugTipoEquipo=Str::slug($tipoEquipo);
            $tipo=Tipo::where('slug','=',$slugTipoEquipo)->get();
            if($tipo->isEmpty()){
                $tipo=Tipo::create([
                    'name'=>$tipoEquipo,
                    'slug'=>$slugTipoEquipo,
                ]);
            }
            return new Protocolo([
           'tipo_text'=>$tipo->name,
           'tipo_id'=>$tipo->id,
           'tarea'=>$tarea,
           'tarea_tipo'=>$tipoTarea,
           'protocolo'=>$protocolo,
           'frecuencia'=>$frecuencia,
           'duracion'=>$duracion,
           'seguridad'=>$seguridad,
           'condiciones'=>$condiciones,
           'description'=>$descripcion,
        ]);
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
