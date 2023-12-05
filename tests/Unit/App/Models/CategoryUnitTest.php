<?php

namespace Tests\Unit\App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    protected function model(): Model
    {
        return new Category();
    }
    public function testIfUseTraits()
    {
        dump(class_uses($this->model()));
        $this->assertTrue(true);
    }
}
