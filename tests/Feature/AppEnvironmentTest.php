<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
    public function testAppEnv() 
    {
        // var_dump(App::environment()); // pengecekan environtmen sekarang ada dimana
        if (App::environment('testing')) {
            // jika lebih dari satu bisa menjadi App::environment(['testing','prod','dev'])
            self::assertTrue(true);
        }
    }
}
