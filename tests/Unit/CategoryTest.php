<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class CategoryTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    protected $idCategory;

    /** @test */
    public function check_if_category_columns_is_correct()
    {
        $category = new Category();
        $expected = [ 'name'];
        $arrayCompared = array_diff($expected, $category->getFillable());
        //dd($arrayCompared);
        $this->assertEquals(0, count($arrayCompared));
    }
}
