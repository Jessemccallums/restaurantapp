<?php

namespace App\Http\Controllers\Cashier;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class CashierController extends Controller
{
    // First Page of Cashier
    public function index()
    {

        return view('cashier.index');
    }
    public function getTables()
    {
        $tables = Table::all();
        $html = '';
        foreach ($tables as $table) {
            $html .= '<div class="col-md-2">';
            $html .=
                '<button class="btn btn-primary">
                        <img class="img-fluid" src="' . url('/images/round-table.png') . '"/>
                        <br>
                        <span class="badge badge-success">' . $table->name . '</span>
                        </button>';
            $html .= '</div>';
        }
        return $html;
    }
}
