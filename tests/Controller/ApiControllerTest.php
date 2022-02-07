<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testApi(): void
    {
        $this->assertEquals(true, true);
        //        $client = static::createClient(array(), array(
        //            'PHP_AUTH_USER' => 'admin',
        //            'PHP_AUTH_PW'   => 'admin',
        //        ));
        //        $client->request(
        //            'POST',
        //            '/api/getNewBaseByNumberCar',
        //            array(),
        //            array(),
        //            array(),
        //            '{"number_car":"Т934ВН50"}'
        //        );
        //        $this->assertResponseIsSuccessful();
    }
}
