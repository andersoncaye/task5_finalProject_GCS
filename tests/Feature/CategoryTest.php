<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function return_view_page_list_category()
    {
        $response = $this->get('/categoria');
        $response->assertStatus(500);
    }

    /** @test */
    public function return_view_page_register_category()
    {
        $response = $this->get('/categoria/novo');
        $response->assertStatus(200);
    }

    /** @tes */
    public function insert_category()
    {
        $category = new Category();
        $response = $category->create(['name' => 'Categoria Add']);
//        echo $response->id.' - '.$response->name;
//        print_r([]);
        $this->assertEquals(1, $response->id > 0);
    }

    /** @tes */
    public function edit_category()
    {
        $category = Category::orderBy('id', 'desc')->first();
        $response = $category->update(['name' => 'Categoria Edit']);
//        print_r([]);
//        echo $category->id.' - '.$category->name;
        $this->assertDatabaseHas('categories', [ 'name' => 'Categoria Edit',]);
    }

    /** @tes */
    public function delete_category()
    {
        $category = Category::orderBy('id', 'desc')->first();
        $response = $category->delete();
//        $response = $category->forceDelete();
//        dd($response);
//        print_r([]);
//        echo $category->id.' - '.$category->name;
        $this->assertEquals(1, $response);
    }
}
