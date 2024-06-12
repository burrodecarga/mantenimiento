<?php

namespace App\Imports;

use App\EquipmentType;
use Maatwebsite\Excel\Concerns\ToModel;

class EquipmenTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dump($row);
        //dd($row);
        if (!isset($row[0])) {
            return null;
        }
        return new EquipmentType([
            'name'=>$row[0],
            'kind'=>$row[1],
            "description"=>$row[2]
        ]);
    }
}
