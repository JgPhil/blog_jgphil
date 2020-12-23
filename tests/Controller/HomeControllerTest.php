<?php

namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as TestWebTestCase;

class HomeControllerTest extends TestWebTestCase
{
    public function test_shows_home_page(){
        $client = self::createClient();
        $client->request('GET', '/home');
        $this->assertResponseIsSuccessful();
    }
}