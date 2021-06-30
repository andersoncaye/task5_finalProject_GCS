<?php

namespace Tests\Feature;

use App\PayType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PayTypeTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function return_view_page_list_pay_type()
    {
        $response = $this->get('/tipo_pagamento');
        $response->assertStatus(500);
    }

    /** @test */
    public function return_view_page_register_pay_type()
    {
        $response = $this->get('/tipo_pagamento/novo');
        $response->assertStatus(200);
    }

    /** @tes */
    public function insert_pay_type()
    {
        $payType = new PayType();
        $response = $payType->create(['name' => 'Forma Pagamento Add']);
        $this->assertEquals(1, $response->id > 0);
    }

    /** @tes */
    public function edit_pay_type()
    {
        $payType = PayType::orderBy('id', 'desc')->first();
        $response = $payType->update(['name' => 'Forma Pagamento Edit']);
        $this->assertDatabaseHas('pay_types', [ 'name' => 'Forma Pagamento Edit',]);
    }

    /** @tes */
    public function delete_pay_type()
    {
        $payType = PayType::orderBy('id', 'desc')->first();
        $response = $payType->delete();
//        $response = $payType->forceDelete();
        $this->assertEquals(1, $response);
    }
}
