<?php

namespace App\Imports;

use App\Equipo;
use App\Subsistema;
use App\Tipo;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquiposImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if($row['equipo']<>null){
                $id=$_POST['subsistema_id'];
                $subsistema=Subsistema::find($id);
                if(!$subsistema){ return redirect()->route('equipos.index')->with('message','Error en datos de equipo');}
                $subid=$subsistema->id;
                $subname=$subsistema->name;
                $sid=$subsistema->sistema_id;
                $sname=$subsistema->sistema;
                $tipo_id=$_POST['tipo_id'];
                $tipo=Tipo::find($tipo_id);
                if(!$tipo){ return redirect()->route('equipos.index')->with('message','Error en datos de equipo');}
                $tipoId=$tipo->id;
                $tipoName=$tipo->name;
                $validador=$subid.'-'.$subname;
                 if($row['descripcion']<>null){$d=$row['descripcion'];}else{$d="sin descripcion";}
                 Equipo::create([
                'name' => $row['equipo'],
                'description' => $d,
                'subsistema_id'=>$subid,
                'subsistema'=>$subname,
                'sistema_id'=>$sid,
                'sistema'=>$sname,
                'tipo_id'=>$tipoId,
                'tipo'=>$tipoName,
                'validador'=>$validador,
                'slug'=>Str::slug($row['equipo']),
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
