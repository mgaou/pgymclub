<?php

namespace App\Exports;

use App\Models\Profession;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberProfessionExport implements FromView
{
    public function view(): View
    {
        $data = Profession::with('members.category')->get();
        return view('exports.liste_membre_dune_profession', [
            'data' => $data
        ]);
    }
}
