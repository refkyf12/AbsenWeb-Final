<?php

namespace App\Http\Controllers;

use App\Models\AkumulasiTahunan;
use Illuminate\Http\Request;
use Exception;
use App\Models\Numbers;
use Session;
use Cache;

class AkumulasiTahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->validate();
        $akumulasiTahunan = AkumulasiTahunan::all();
		return view('akumulasiTahunan.index',['data'=>$akumulasiTahunan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AkumulasiTahunan $akumulasiTahunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AkumulasiTahunan $akumulasiTahunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AkumulasiTahunan $akumulasiTahunan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AkumulasiTahunan $akumulasiTahunan)
    {
        //
    }

    private $outputNumbers = [];
    
    public function getUniqueNumber(Request $request)
    { 
        $inputNumber = $request->input('input_number');

        $outputNumbers = Cache::get('output_number', []);

        if (in_array($inputNumber, $outputNumbers)) {
            $outputNumber = $inputNumber + 1;
            while (in_array($outputNumber, $outputNumbers)) {
                $outputNumber++;
            }
        } else {
            $outputNumber = $inputNumber;
        }

        $outputNumbers[] = $outputNumber;
        Cache::put('output_number', $outputNumbers);

        return response()->json(['output_number' => $outputNumber]);
    }
}
