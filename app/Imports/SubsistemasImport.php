<?php

namespace App\Imports;

use App\Sistema;
use App\Subsistema;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Request;

class SubsistemasImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {


        foreach ($rows as $row)
        {

            if($row['subsistema']<>null)
            {

                $sistema=Sistema::find($_POST['sistema_id']);
                if(!$sistema){ return redirect()->route('subsistemas.index')->with('message','Error en datos de sistema');}
                $slug_subsistema=Str::slug($row['subsistema']);
                $subsistema=Subsistema::where('slug','=',$slug_subsistema)
                                       ->where('sistema_id','=',$sistema->id)
                                        ->get();
                if($subsistema->isEmpty())
                {
                    $sid=$sistema->id;
                    $sname=$sistema->name;
                    $validador=$sid.'-'.$sname;
                    if($row['descripcion']<>null){$d=$row['descripcion'];}else{$d="sin descripcion";}
                    Subsistema::create([
                    'name' => $row['subsistema'],
                    'description' => $d,
                    'sistema_id'=>$sid,
                    'sistema'=>$sname,
                    'validador'=>$validador,
                    'slug'=>Str::slug($row['subsistema']),]);
                 }
                }else{
                    $row->skip(1);
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
