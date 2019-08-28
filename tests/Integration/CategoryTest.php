<?php

namespace Tests\Integration;

use Hexa\Shop\Infrastructure\Persistence\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    function testCreateCategory()
    {
        $category = factory(Category::class)->create();
        $this->assertIsInt($category->id);
    }

}
