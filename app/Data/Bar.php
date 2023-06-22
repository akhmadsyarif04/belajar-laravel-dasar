<?php 

namespace App\Data;

class Bar 
{
    private Foo $foo;

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function bar(): string 
    {
        return $this->foo->foo() . ' and Bar';
    }
}

/**
 * Dari class foo dan bar bisa tahu bahwa bar membutuhkan foo, artinya bar depends-on foo, atau foo adalah dependency untuk bar
 * dependency injection berarti perlu memasukan object foo ke dalam bar, sehingga bar bisa menggunakan object foo
 * pada kode foo dan bar menggunakan constructor untuk melakukan injection (memasukan dependency), sebenarnya cara
 *      nya tidak hanya menggunakan contructor, bisa menggunakan attribute atau function, namun sanga t direcomendasikan menggunakan 
 *      constructor agar bisa terlihat jelas dependecies nya dan tidak lupa menambahkan dependencies nya.
 */