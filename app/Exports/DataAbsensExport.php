<?php

namespace App\Exports;

use App\Absen;
use App\DataAbsen;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DataAbsensExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    function __construct($format_waktu, $data, $waktu, $filter) {
        $this->format_waktu = $format_waktu;
        $this->data = $data;
        $this->waktu = $waktu;
        $this->filter = $filter;
    }
    public function collection()
    {
        $timeNow    = Carbon::now();
        if($this->filter == "waktu"){
            $dataabsens = DataAbsen::leftJoin('users', 'data_absens.id_user','=','users.id')->leftJoin('absensis', 'data_absens.id_absen','=','absensis.id')->select('materi_pembelajaran','absensis.updated_at','name','email','data_absens.created_at');
            if($this->format_waktu == 'semua_waktu'){
                $baru = $dataabsens->get();
            }else if($this->format_waktu == 'hari_ini'){
                $baru = $dataabsens->whereDay('data_absens.created_at', $timeNow->day)->whereMonth('data_absens.created_at', $timeNow->month)->whereYear('data_absens.created_at', $timeNow->year)->get();
            }else if($this->format_waktu == 'bulan_ini'){
                $baru = $dataabsens->whereMonth('data_absens.created_at', $timeNow->month)->whereYear('data_absens.created_at', $timeNow->year)->get();
            }else if($this->format_waktu == 'tahun_ini'){
                $baru = $dataabsens->whereYear('data_absens.created_at', $timeNow->year)->get();
            }else{
                $id_dataabsens = [];
                foreach (DataAbsen::get() as $value) {
                    if($timeNow->diffInHours($value->created_at) < $this->waktu){
                        $id_dataabsens[] = $value->id;
                    }
                }
                $baru = DataAbsen::whereIn('data_absens.id',$id_dataabsens)->leftJoin('users', 'data_absens.id_user','=','users.id')->leftJoin('absensis', 'data_absens.id_absen','=','absensis.id')->select('materi_pembelajaran','absensis.updated_at','name','email','data_absens.created_at')->whereIn('data_absens.id',$id_dataabsens)->get();
            }
        }else{
            $baru = DataAbsen::whereIn('data_absens.id_absen',$this->data)->leftJoin('users', 'data_absens.id_user','=','users.id')->leftJoin('absensis', 'data_absens.id_absen','=','absensis.id')->select('materi_pembelajaran','absensis.updated_at','name','email','data_absens.created_at')->get();
        }
        return $baru;
    }public function headings(): array
    {
        return [
            'Materi Pembelajaran',
            'Tanggal Absensi Dibuat',
            'Nama Siswa',
            'Email',
            'Tanggal Melakukan Absensi',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16)->setName('Times New Roman')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS
                    ]
                ]);
                $event->sheet->getDelegate()->getStyle('A2:E200')->getFont()->setSize(12)->setName('Times New Roman')->applyFromArray([
                    'font' => [
                        'bold' => false,
                    ]
                ]);
            },
        ];
    }
}
