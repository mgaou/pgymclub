<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeWriting;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class MembersExport implements FromCollection, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::all();
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
