<?php

namespace Tests\Unit\App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

abstract class ModelTestCase extends TestCase
{
    public function test_traits_exists()
    {
        /* Retorna as traits usadas na classe */
        $traits = array_keys(class_uses($this->model()));
        $this->assertEquals($this->expectedTraits(), $traits);
    }

    abstract protected function model(): Model;

    abstract protected function expectedTraits(): array;

    public function test_fillable()
    {
        $fillable = $this->model()->getFillable();

        $this->assertEquals($this->expectedFillables(), $fillable);
    }

    abstract protected function expectedFillables(): array;

    public function test_incrementing_is_false()
    {
        $this->assertFalse($this->model()->incrementing);
    }

    public function test_has_casts()
    {
        $casts = $this->model()->getCasts();
        $this->assertEquals($this->expectedCasts(), $casts);
    }

    abstract protected function expectedCasts(): array;
}