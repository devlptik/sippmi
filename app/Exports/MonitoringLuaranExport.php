<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MonitoringLuaranExport implements FromView
{
    public function __construct($tahun, $skema, $results, $outputs){
        $this->tahun = $tahun;
        $this->results = $results;
        $this->outputs = $outputs;
        $this->skema = $skema;
    }

    public function view(): View
    {
        return view('admins.monitorings.luarans._table-export', [
            'outputs' => $this->outputs,
            'skema' => $this->skema,
            'results' => $this->results,
            'tahun' => $this->tahun
        ]);
    }
}
