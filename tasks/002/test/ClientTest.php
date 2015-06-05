<?php

require_once(dirname(__FILE__).'/../lib/Client.php');

class ClientTest extends PHPUnit_Framework_TestCase {

    public function testCreateClient() {
        $client = new Client('test name');

        $this->assertEquals($client->getName(), 'test name');
    }
    
}
