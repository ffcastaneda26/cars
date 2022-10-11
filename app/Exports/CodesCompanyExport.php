<?php

namespace App\Exports;

use App\Models\ProcessCodeCompany;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CodesCompanyExport implements FromCollection,WithHeadings
{

    public $processCodeCompany = null;

    public function __construct(ProcessCodeCompany $processCodeCompany)
    {
        $this->processCodeCompany = $processCodeCompany;
    }

    public function headings():array{
        return[
            'Company',
            'Code'
        ];
    }

    public function array(): array
    {

        $codes = array();
        return [
            [1, 2, 3],
            [4, 5, 6]
        ];

        foreach($this->processCodeCompany->codes as $code_company){

           return ['company' => $this->processCodeCompany->company->name,
                      'code'    =>$code_company->code
                    ];

        }

        return $codes;

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = array();
        foreach($this->processCodeCompany->codes as $record){
           $result[] = array(
              'Company'=> $this->processCodeCompany->company->name,
              'Code' => $record->code,
           );
        }

        return collect($result);
    }
}
