<?php

namespace App\Exports;

use App\Models\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;

class RequestsPdfExport
{
    public function view(): View
    {
        $requests = Request::all();
        return view('exports.requests', compact('requests'));
    }

    public function download()
    {
        $pdf = Pdf::loadView('exports.requests', ['requests' => Request::all()]);
        return $pdf->download('requests.pdf');
    }
}

