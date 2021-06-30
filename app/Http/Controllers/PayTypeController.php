<?php

namespace App\Http\Controllers;

use App\PayType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PayTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paytypes = PayType::get();

        return view('paytype/list', ['paytypes' => $paytypes]);
    }

    public function formNew()
    {
        return view('paytype/form');
    }

    public function formEdit($id)
    {

        $paytype = PayType::findOrFail($id);

        return view('paytype/form', ['paytype' => $paytype]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paytype = new PayType();
        $paytype = $paytype->create($request->all());
        return Redirect::to('/tipo_pagamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paytype = PayType::findOrFail($id);
        $paytype->update($request->all());
        return Redirect::to('/tipo_pagamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paytype = PayType::findOrFail($id);
        $paytype->delete();
        return Redirect::to('/tipo_pagamento');
    }
}
