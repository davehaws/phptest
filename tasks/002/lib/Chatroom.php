<?php

require_once('Client.php');

class Chatroom {
    private $name;
    private $occupants;

    public function __construct($name) {
        $this->name = $name;
        $this->occupants = [];
    }

    public function getName() {
        return $this->name;
    }

    public function getOccupants() {
        return array_values($this->occupants);
    }

    public function addClient(Client $client) {
        $this->occupants[$client->getName()] = $client;
    }
}
