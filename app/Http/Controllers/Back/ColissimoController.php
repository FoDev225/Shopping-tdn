<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Country, Range, Colissimo };

class ColissimoController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $countries = Country::with('ranges')->get();
        $ranges = Range::all();

        return view('back.colissimos.edit', compact('countries', 'ranges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->except('_method', '_token');

        // Validation
        $dataValidation = $data;
        foreach($dataValidation as $key => &$value ) {
            $value = 'required|numeric';            
        }
        $request->validate($dataValidation);

        $colissimos = Colissimo::all();

        foreach($colissimos as $colissimo) {
            $price = $data['n' . $colissimo->id];
            if($colissimo->price !== $price) {
                $colissimo->price = $price;
                $colissimo->save();
            }
        }

        return back()->with('alert', config('messages.colissimosupdated'));
    }
}
