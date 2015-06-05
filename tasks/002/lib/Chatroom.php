<?php

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
        return $this->occupants;
    }
}
