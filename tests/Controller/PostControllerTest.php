<?php

namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as TestWebTestCase;

class PostControllerTest extends TestWebTestCase
{
    public function test_shows_new_post_page(){
        $client = self::createClient();
        $client->request('GET', '/post/new');
        $this->assertResponseIsSuccessful();
    }
}
