<?php

require_once('Client.php');
require_once('Chatroom.php');

class Chat {
    private $clients;
    private $chatrooms;

    public function __construct() {
        $this->clients = [];
        $this->chatrooms = [];
    }

    public function getClients() {
        return array_values($this->clients);
    }

    public function getChatrooms() {
        return array_values($this->chatrooms);
    }

    /**
     * Creates a client from the chat session
     * If the chatroom name already exists, it just returns the previously created room
     * @param string $name
     * @return Client
     */
    public function createClient($name) {
        if (!isset($this->clients[$name])) {
            $this->clients[$name] = new Client($name);
        }
        return $this->clients[$name];
    }

    /**
     * Creates a chatroom from the chat session
     * If the chatroom name already exists, it just returns the previously created room
     * @param string $name
     * @return Chatroom
     */
    public function createChatroom($name) {
        if (!isset($this->chatrooms[$name])) {
            $this->chatrooms[$name] = new ChatRoom($name);
        }
        return $this->chatrooms[$name];
    }

}
