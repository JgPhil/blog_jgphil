<?php

namespace App\Tests;

use App\Tests\LogUtils;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AbstractWebTestCaseClass extends WebTestCase
{
    protected $client;
    protected $entityManager;

    public function setUp(): void
    {
        $this->client = static::createClient();
        $this->entityManager = $this->client->getContainer()->get('doctrine')->getManager();
    }

    public function testAvoidWarnings()
    {
        $this->assertNotEquals(1, 2);
    }
}
