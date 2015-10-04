<?php
require_once ('tests/mysqliLoadedTest.php');
class mysqliLoadedTest extends PHPUnit_Framework_TestCase
{
    public function testForMysqli()
    {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped('[mysqliLoadedTest]->[testForMysqli()]: The MySQLi extension is not available');
        }else{
            #fwrite(STDERR, print_r('[mysqliLoadedTest]->[testForMysqli()]: The MySQLi extension is available', TRUE));
        }
        return '[mysqliLoadedTest]->[testForMysqli()]: The MySQLi extension is available';
    }
}
?>
