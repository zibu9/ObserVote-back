<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ResultatsExport implements WithMultipleSheets
{
    protected $data;
    protected $data2;

    public function __construct(array $data, array $data2)
    {
        $this->data = $data;
        $this->data2 = $data2;
    }

    public function sheets(): array
    {
        return [
            'Global Results' => new ResultatsSheet($this->data),
            'Other Results' => new OtherSheet($this->data2),
        ];
    }
}
