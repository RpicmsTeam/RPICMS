<?php
require_once ('tests/mysqliLoadedTest.php');
class mysqliLoadedTest extends PHPUnit_Framework_TestCase
{
    public function testForMysqli()
    {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped('[mysqliLoadedTest]->[testForMysqli()]: The MySQLi extension is not available');
        }
    }

    /**
     * @depends testForMysqli
     */
    public function testDBConnection()
    {
      $mysqli = new mysqli("localhost","root","","RPICMS");
      // Check connection
      if ($mysqli->connect_errno > 0)
      {
        $this->markTestSkipped($mysqli->connect_error());
      }
    }

    /**
     * @depends testForMysqli
     * @depends testDBConnection
     */
     public function testCreateTestingTables()
     {
       $mysqli = new mysqli("localhost","root","","RPICMS");




     }
}
?>
