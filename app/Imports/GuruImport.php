<?php

namespace App\Imports;

use App\Guru;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'NIP' => $row[0],
            'nama' => $row[1], 
            'JK' => $row[2], 
            'password' => Hash::make($row[3]),
        ]);
    }
}
