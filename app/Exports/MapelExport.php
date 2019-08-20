<?php

namespace App\Exports;

use App\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;

class MapelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mapel::select('mapels.mapel', 'mapels.KKM')->get();
    }
}
