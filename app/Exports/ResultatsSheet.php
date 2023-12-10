<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResultatsSheet implements FromCollection, WithHeadings, WithTitle
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
        return 'Global Results';
    }
}
