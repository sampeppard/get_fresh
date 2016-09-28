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

        function getId() {
            return $this->id;
        }

    }
?>
