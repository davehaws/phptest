<?php

class Client {
    private $name;

    private $listener;

    public function __construct($name) {
        $this->name = $name;
        $this->listener = null;
    }

    public function getName() {
        return $this->name;
    }

    public function addListener($listener) {
        $this->listener = $listener;
    }

    public function receive(Client $from_client, Chatroom $in_chatroom, $message) {
        if (!is_null($this->listener)) {
            $this->listener->receive($from_client, $in_chatroom, $message);
        }
    }
}
