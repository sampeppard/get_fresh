<?php

    class Stylist {

        private $name;
        private $id;

        function __construct($name_input, $id = null) {
            $this->name = $name_input;
            $this->$speciality = $speciality_input;
            $this->id = $id;
        }

        function setName($name_input) {
            $this->name = $name_input;
        }

        function getName() {
            return $name_input;
        }

        function getId() {
            return $this->id;
        }

        function getClients() {

        }



    }

?>
