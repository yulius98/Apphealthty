<?php

namespace App\Http\Controllers;

use App\Models\TblBarang;
use Illuminate\Http\Request;

class HomeShowController extends Controller
{
    public function ProductShow()
    {
        $dtproduct = TblBarang::all();
        return view('Home',['dtproduct' => $dtproduct]);
    }
}