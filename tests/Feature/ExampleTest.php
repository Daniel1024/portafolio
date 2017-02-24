<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_puedo_enviar_solicitud_contacto()
    {
        $this->visitRoute('home')
            ->type('Daniel Lopez', 'nombre')
            ->type('d.lopez.1740@gmail.com', 'correo')
            ->type('Esto es un mensaje de ahora', 'mensaje')
            ->press('Enviar')
            ->seeRouteIs('home');

        $this->seeInDatabase('contacts', [
            'name' => 'Daniel Lopez',
            'email' => 'd.lopez.1740@gmail.com',
            'message' => 'Esto es un mensaje de ahora',
        ]);
    }
}
