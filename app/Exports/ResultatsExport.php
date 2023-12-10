<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Writer\Xls\Worksheet;

class ResultatsExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'N°', 'Province', 'Votant Initial', 'Votant', 'Nos Voix', 'Bulletins Restants', 'Pourcentage (%)'
        ];
    }

    public function title(): string
    {
        return 'globalResults';
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
    }
}
