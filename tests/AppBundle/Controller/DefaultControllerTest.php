<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/students/detail/adah_reichel_7');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Adah Reichel', $crawler->filter('#container h1')->text());
    }
}
