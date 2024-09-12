<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\BeforeWriting;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class MembersInactifsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */public function collection()
    {
        return Member::where('active','null')->get();//liste des membres inactifs uniquement
    }

    public function registerEvents(): array
    {
        return [
            BeforeWriting::class => function(BeforeWriting $event) {
                $event->getWriter()
                        ->getDelegate()
                        ->getActiveSheet() 
                        ->getPageSetup()
                        ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
            }
        ];
    }
}




