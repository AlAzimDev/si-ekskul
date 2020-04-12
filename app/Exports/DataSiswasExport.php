<?php

namespace App\Exports;

use App\DataSiswa;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DataSiswasExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    function __construct($format_waktu, $mode, $waktu) {
        $this->format_waktu = $format_waktu;
        $this->mode = $mode;
        $this->waktu = $waktu;
    }
    public function collection()
    {
        $timeNow    = Carbon::now();
        if($this->mode == 'password'){
            $datasiswas = DataSiswa::leftJoin('users', 'data_siswas.id_user','=','users.id')->select('email','password2','nama_lengkap','nama_panggilan','jenis_kelamin','tempat_lahir','alamat','handphone');
        }else{
            $datasiswas = DataSiswa::leftJoin('users', 'data_siswas.id_user','=','users.id')->select('email','nama_lengkap','nama_panggilan','jenis_kelamin','tempat_lahir','alamat','handphone');
        }
        if($this->format_waktu == 'semua_waktu'){
            $baru = $datasiswas->get();
        }else if($this->format_waktu == 'hari_ini'){
            $baru = $datasiswas->whereDay('data_siswas.created_at', $timeNow->day)->whereMonth('data_siswas.created_at', $timeNow->month)->whereYear('data_siswas.created_at', $timeNow->year)->get();
        }else if($this->format_waktu == 'bulan_ini'){
            $baru = $datasiswas->whereMonth('data_siswas.created_at', $timeNow->month)->whereYear('data_siswas.created_at', $timeNow->year)->get();
        }else if($this->format_waktu == 'tahun_ini'){
            $baru = $datasiswas->whereYear('data_siswas.created_at', $timeNow->year)->get();
        }else{
            $id_datasiswas = [];
            foreach (DataSiswa::get() as $value) {
                if($timeNow->diffInHours($value->created_at) < $this->waktu){
                    $id_datasiswas[] = $value->id;
                }
            }
            $baru = $datasiswas->whereIn('data_siswas.id',$id_datasiswas)->get();
        }
        foreach($baru as $data){
            $data->tempat_lahir = $data->tempat_lahir.', '.date('d M Y', strtotime($data->tanggal_lahir));
            $data->handphone = substr($data->handphone, 0, 4)."-".substr($data->handphone, 4, 4)."-".substr($data->handphone,8);
            if($data->jenis_kelamin == 'll'){$data->jenis_kelamin = "Laki-Laki";}else{$data->jenis_kelamin = "Perempuan";};
        }
        return $baru;
    }
    public function headings(): array
    {
        if($this->mode == 'password'){
            return [
                'Email',
                'Password',
                'Nama Lengkap',
                'Nama Panggilan',
                'Jenis Kelamin',
                'Tempat & Tanggal Lahir',
                'Alamat',
                'No. Handphone',
            ];
        }else{
            return [
                'Email',
                'Nama Lengkap',
                'Nama Panggilan',
                'Jenis Kelamin',
                'Tempat & Tanggal Lahir',
                'Alamat',
                'No. Handphone',
            ];
        }
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:H1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16)->setName('Times New Roman')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS
                    ]
                ]);
                $event->sheet->getDelegate()->getStyle('A2:H200')->getFont()->setSize(12)->setName('Times New Roman')->applyFromArray([
                    'font' => [
                        'bold' => false,
                    ]
                ]);
            },
        ];
    }
}
