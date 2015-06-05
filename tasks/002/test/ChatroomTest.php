<?php

require_once(dirname(__FILE__).'/../lib/Chatroom.php');

class ChatroomTest extends PHPUnit_Framework_TestCase {

    public function testCreateChatroom() {
        $chatroom = new Chatroom('room name');

        $this->assertEquals($chatroom->getName(), 'room name');

        $this->assertEquals($chatroom->getOccupants(), [], 'The occupant list should have been an empty array');
    }

}
