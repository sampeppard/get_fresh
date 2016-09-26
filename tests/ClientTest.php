<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = "mysql:host=localhost:8889;dbname=hair_salon_test";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase {

        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_getName() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $new_name = "Jordan";

            //Act
            $test_stylist->setName($new_name);
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_save() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->save();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0])
        }

        function test_getAll() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->save();

            //Assert
            $this->assertEquals($test_stylist, $)
        }

        function test_deleteAll() {
            //Arrange

            //Act

            //Assert
        }

        function test_find() {
            //Arrange

            //Act

            //Assert
        }

        function test_update() {
            //Arrange

            //Act

            //Assert
        }

        function test_delete() {
            //Arrange

            //Act

            //Assert
        }

    }

?>
