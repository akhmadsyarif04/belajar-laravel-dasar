<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class COnfigurationTest extends TestCase
{

    public function testConfig()
    {
        $firstname = config('contoh.author.first');
        $lastname = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('AKHMAD', $firstname);
        self::assertEquals('Syarif', $lastname);
        self::assertEquals('akhmadsyarif04@gmail.com', $email);
        self::assertEquals('www.bekantanjantan.com', $web);
    }
}
