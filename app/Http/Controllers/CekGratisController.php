<?php

namespace App\Http\Controllers;

use App\Models\TblAssesment;
use Illuminate\Http\Request;


class CekGratisController extends Controller
{
    public function store(Request $request)
    {
    //dd($request->all());
        // Validate the request data
        //$request->validate([
        //    'email' => 'required|email',
        //    'phone' => 'required|string|max:15',
        //]);

        $penilaian = new TblAssesment();
        $penilaian->kode_assesment = $request->registrationNumber;
        $penilaian->nama_pelanggan = $request->nama;
        $penilaian->no_hp = $request->no_hp;
        $penilaian->berat_badan = $request->berat_badan;
        $penilaian->tinggi_badan = $request->tinggi_badan;
        $penilaian->aktivitas=$request->aktifitas;
        $penilaian->alergi=$request->alergi;
        $penilaian->hasil=null;
        $penilaian->status='pending';
        $penilaian->save();

        return view('/MintaHasil',['noreg' => $request->registrationNumber]);

        //// Process the data (e.g., save to database, send email, etc.)
        //// For demonstration, we'll just return a success message
        //return response()->json([
        //    'message' => 'Cek Gratis request received successfully!',
        //    'data' => $request->only('email', 'phone'),
        //]);
    }
}