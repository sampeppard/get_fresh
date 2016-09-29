<?php

    class Client {

        private $name;
        private $stylist_id;
        private $id;

        function __construct($name_input, $stylist_id_input, $id=null) {
            $this->name = $name_input;
            $this->stylist_id = $stylist_id_input;
            $this->id = $id;
        }

        function setName($name_input) {
            $this->name = $name_input;
        }

        function getName() {
            return $this->name;
        }

        function setStylistId($stylist_id_input) {
            $this->stylist_id = $stylist_id_input;
        }

        function getStylistId() {
            return $this->stylist_id;
        }

        function getId() {
            return $this->id;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll() {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients");

            $clients = array();
            foreach ($returned_clients as $client) {
                $name = $client['name'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];

                $new_client = new Client($name, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM clients");
        }

        static function find($search_id) {
            $found_client = null;
            $clients = Client::getAll();
            foreach ($clients as $client) {
                $client_id = $client->getId();
                if ($client_id = $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

    }
?>
