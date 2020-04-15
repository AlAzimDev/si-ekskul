<?php

namespace App\Imports;

use App\DataSiswa;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class DataSiswasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $id = User::where('email', $row[0])->get();
        $datasiswa = DataSiswa::where('id_user', $id->first()->id)->get();
        if(($id->count() > 0) && ($datasiswa->count() < 1)){
            return new DataSiswa([
                'nama_lengkap'     => $row[2],
                'nama_panggilan'     => $row[3],
                'jenis_kelamin'     => $row[4],
                'tempat_lahir'     => $row[5],
                'tanggal_lahir'     => $row[6],
                'alamat'     => $row[7],
                'handphone'     => $row[8],
                'id_user'     => $id->first()->id,
            ]);
        }
    }
}
