<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = "mysql:host=localhost:8889;dbname=hair_salon_test";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Client::deleteAll();
        }

        function testGetName() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);
            $new_name = "Alex";

            //Act
            $test_client->setName($new_name);
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function testGetId() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSave() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);

            //Act
            $test_client->save();
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function testGetAll() {
            //Arrange
            $name = "Hal";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();

            $name2 = "Jordan";
            $stylist_id2 = 3;
            $id2 = 2;
            $test_client2 = new Client($name2, $stylist_id2, $id2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function testFind() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();

            $name2 = "Jordan";
            $stylist_id2 = 3;
            $id2 = 2;
            $test_client2 = new Client($name2, $stylist_id2, $id2);
            $test_client2->save();

            //Act
            $result = Client::find($test_client2->getId());

            //Assert
            $this->assertEquals($test_client2, $result);
        }

        function testDeleteAll() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testUpdate() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();

            $new_name = "Meryl";

            //Act
            $test_client->update($new_name);
            $result = $test_client->getName();

            //Assert
            $this->assertEquals("Meryl", $result);
        }

        function testDelete() {
            //Arrange
            $name = "Naomi";
            $stylist_id = 3;
            $id = 1;
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();

            $name2 = "Jordan";
            $stylist_id2 = 3;
            $id2 = 2;
            $test_client2 = new Client($name2, $stylist_id2, $id2);
            $test_client2->save();

            //Act
            $test_client->delete();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client2], $result);
        }

    }

?>
