<?php

require_once(dirname(__FILE__).'/../lib/Chatroom.php');

class ChatroomTest extends PHPUnit_Framework_TestCase {

    public function testCreateChatroom() {
        $chatroom = new Chatroom('room name');

        $this->assertEquals($chatroom->getName(), 'room name');

        $this->assertEquals($chatroom->getOccupants(), [], 'The occupant list should have been an empty array');
    }

    private function createClients(array $names) {
        $result = [];
        foreach ($names as $name) {
            $result[] = new Client($name);
        }
        return $result;
    }

    public function testAddClientsToChatroom() {
        $chatroom = new Chatroom("Starcraft II");

        $clients = $this->createClients(['bob', 'susan', 'dillan']);

        foreach ($clients as $client) {
            $chatroom->addClient($client);
        }

        $this->assertEquals($chatroom->getOccupants(), $clients);
    }
}
