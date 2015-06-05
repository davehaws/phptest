<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chat
 *
 * @author daveh_000
 */
class Chat {
    private $clients;
    private $chatrooms;

    public function __construct() {
        $this->clients = [];
        $this->chatrooms = [];
    }

    public function createClient($name) {
        if (!isset($this->clients[$name])) {
            $this->clients[$name] = new Client($name);
        }
        return $this->clients[$name];
    }

    public function createChatroom($name) {
        if (!isset($this->chatrooms[$name])) {
            $this->chatrooms[$name] = new ChatRoom($name);
        }
        return $this->chatrooms[$name];
    }

    public function getClients() {
        return $this->clients;
    }

    public function getChatrooms() {
        return $this->chatrooms;
    }
}
