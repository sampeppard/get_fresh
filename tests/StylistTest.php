<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = "mysql:host=localhost:8889;dbname=hair_salon_test";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            stylist::deleteAll();
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
            $this->assertEquals($new_name, $result);
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
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $name2 = "Jordan";
            $id2 = 2;
            $test_stylist2 = new Stylist($name2, $id2);
            $test_stylist2->save();

            $name3 = "Blake";
            $id3 = 3;
            $test_stylist3 = new Stylist($name3, $id3);
            $test_stylist3->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2, $test_stylist3], $result);
        }

        // function test_deleteAll() {
        //     //Arrange
        //     //Act
        //     //Assert
        // }

        // function test_find() {
        //     //Arrange
        //     //Act
        //     //Assert
        // }

        // function test_update() {
        //     //Arrange
        //     //Act
        //     //Assert
        // }

        // function test_delete() {
        //     //Arrange
        //     //Act
        //     //Assert
        // }

    }

?>
