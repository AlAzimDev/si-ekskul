<?php

namespace App\Imports;

use App\User;
use Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(User::where('email',$row[0])->get()->count() > 0){
            // dd('salah');
        }else{
            return new User([
                'name'     => $row[2],
                'email'    => $row[0],
                'password' => Hash::make($row[1]),
                'password2' => $row[1],
                'role' => 0,
            ]);
        }
    }
}
