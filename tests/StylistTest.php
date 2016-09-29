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
            Stylist::deleteAll();
        }

        function testGetName() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName() {
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

        function testGetId() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSave() {
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

        function testGetAll() {
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

        function testDeleteAll() {
            //Arrange
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testFind() {
            //Arrange
            // we create multiple stylists in order to test finding the one we want
            $name = "Hal";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $name2 = "Jordan";
            $id2 = 2;
            $test_stylist2 = new Stylist($name2, $id2);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist2->getId());

            //Assert
            $this->assertEquals($test_stylist2, $result);
        }

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
