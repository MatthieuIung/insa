<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class PoneysTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testRemovePoneyFromField()
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->removePoneyFromField(3);


        // Assert
        $this->assertEquals(5, $Poneys->getCount());
    }

    public function testaddPoneyFromField()
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->addPoneyFromField(1);


        // Assert
        $this->assertEquals(9, $Poneys->getCount());
    }


    //on en retire plus qu'il y en a 
    public function testRemovePoneyFromField2()
    {
        // Setup
        $Poneys = new Poneys();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("\n\nTrop de poneys retirés");

        // Action
        $Poneys->removePoneyFromField(10);
    }


    /**
     * @dataProvider removePoneysProvider
     *
     * @return void
     */
    public function testRemovePoneyFromField3($substract,$count)
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->removePoneyFromField($substract);

        // Assert
        $this->assertEquals($count, $Poneys->getCount());
    }

    public function removePoneysProvider()
    {
        return array(
            array(5, 3),
            array(4, 4),
            array(2, 6),
            array(0, 8),
            array(1, 7),
            array(2, 7)
        );
    }

    public function test_getNames(){
        $names = ['Joe', 'William', 'Jack', 'Averell'];
        $this->poneys = $this->getMockBuilder('Poneys')->getMock();
        $this->poneys->expects($this->exactly(1))->method('getNames')->willReturn($names);
        $this->assertEquals($names, $this->poneys->getNames());
    }

    /**
     * @dataProvider addPoneysProvider
     *
     * @return void
     */
    public function testAddPoneyFromField2($substract,$count)
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->addPoneyFromField($substract);

        // Assert
        $this->assertEquals($count, $Poneys->getCount());
    }

    public function addPoneysProvider()
    {
        return array(
            array(2, 10),
            array(3, 11),
            array(4, 12),
            array(8, 16),
            array(7, 10)
        );
    }

}
?>
