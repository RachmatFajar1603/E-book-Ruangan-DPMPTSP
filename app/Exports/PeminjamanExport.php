<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeminjamanExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        return Peminjaman::query()
            ->whereBetween('tanggal_pinjam', [$this->startDate, $this->endDate])
            ->orderBy('tanggal_pinjam');
    }

    public function headings(): array
    {
        return [
            'No',
            'Username',
            'NIP/NO REG/NIK',
            'Bidang',
            'Penanggung Jawab',
            'Ruangan',
            'Tgl. Mulai Peminjaman',
            'Tgl. Selesai Peminjaman',
            'Waktu Mulai',
            'Waktu Selesai',
            'Keperluan',
            'Jumlah Yang Hadir',
            'Status',
        ];
    }

    public function map($peminjaman): array
    {
        static $rowNumber = 0;
        $rowNumber++;

        return [
            $rowNumber,
            $peminjaman->user->nama,
            $peminjaman->user->nip_reg,
            $peminjaman->user->bidang->nama,
            $peminjaman->penanggung_jawab,
            $peminjaman->nama_ruangan,
            $peminjaman->tanggal_pinjam,
            $peminjaman->tanggal_selesai,
            $peminjaman->waktu_mulai,
            $peminjaman->waktu_selesai,
            $peminjaman->catatan,
            $peminjaman->kapasitas,
            $peminjaman->status,
        ];
    }
}