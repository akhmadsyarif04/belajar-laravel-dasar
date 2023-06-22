<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;

class ServiceContainerTest extends TestCase
{
    /** @test */
    public function TestServiceContainer()
    {
      $foo1 = $this->app->make(Foo::class); // new Foo()
      $foo2 = $this->app->make(Foo::class); // new Foo()

      self::assertEquals('Foo', $foo1->foo());
      self::assertEquals('Foo', $foo2->foo());
      self::assertNotSame($foo1, $foo2);
    }

    public function TestBind()
    {
        // $person = $this->app->make(Person::class); // new Foo()
        // self::assertNotNull($person);
        
        // method bind(key, closure). 
        $this->app->bind(Person::class, function ($app) {
            return new Person("Akhmad","Syarif");
        });

        $person1 = $this->app->make(Person::class); // memanggil function closure // new Person("Akhmad","Syarif");
        $person2 = $this->app->make(Person::class); // memanggil function closure // new Person("Akhmad","Syarif");

        self::assertEquals("Akhmad", $person1->firstname);
        self::assertEquals("Akhmad", $person2->firstname);
        self::assertNotSame($person1, $person2);
    }

    public function TestSingleton()
    {
        // method bind(key, closure). 
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Akhmad","Syarif");
        });

        $person1 = $this->app->make(Person::class); // new Person("Akhmad","Syarif"); if not exist
        $person2 = $this->app->make(Person::class); // return yang sudah ada sebelumnya

        self::assertEquals("Akhmad", $person1->firstname);
        self::assertEquals("Akhmad", $person2->firstname);
        self::assertSame($person1, $person2);
    }

    public function testInstance()
    {
        $person = new Person("Akhmad","Syarif");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); // $person;
        $person2 = $this->app->make(Person::class); // $person;
        $person3 = $this->app->make(Person::class); // $person;
        $person4 = $this->app->make(Person::class); // $person;

        self::assertEquals("Akhmad", $person1->firstname);
        self::assertEquals("Akhmad", $person2->firstname);
        self::assertSame($person1, $person2);
    }
}
