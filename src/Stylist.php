<?php

    class Stylist {

        private $name;
        private $id;

        function __construct($name_input, $id = null) {
            $this->name = $name_input;
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

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll() {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach ($returned_stylists as $stylist) {
                $name = $stylist['name'];
                $id = $stylist['id'];

                $new_stylist = new Stylist($name, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function deleteAll() {
            $GLOBALS["DB"]->exec("DELETE FROM stylists;");
        }

        static function find($search_id) {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id = $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }

    }

?>
