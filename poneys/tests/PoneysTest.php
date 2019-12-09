<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class PoneysTest extends TestCase
{
    



    /**
     * @dataProvider removePoneysProviderSuccess
     *
     * @return void
     */
    public function testRemovePoneyFromFieldSucc($substract,$count)
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->removePoneyFromField($substract);

        // Assert
        $this->assertEquals($count, $Poneys->getCount());
    }

    public function removePoneysProviderSuccess()
    {
        return array(
            array(5, 3),
            array(4, 4),
        );
    }

    /**
     * @dataProvider removePoneysProviderFailure
     *
     * @return void
     */
    public function testRemovePoneyFromFieldFail($substract,$count)
    {
        // Setup
        $Poneys = new Poneys();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Tu ne peux pas retirer des Poneys qui n existent pas');
        $this->expectExceptionMessage('nombre négatifs');

        // Action
        $Poneys->removePoneyFromField($substract);

        // Assert
        $this->assertEquals($count, $Poneys->getCount());
    }

    public function removePoneysProviderFailure()
    {
        return array(
            array(2, 7),
            array(10,5),
            array(-1, 9)
        );
    }






    /**
     * @dataProvider addPoneysProviderFailure
     *
     * @return void
     */
    public function testAddPoneyFromFieldFail($substract,$count)
    {
        // Setup
        $Poneys = new Poneys();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Plus de place pour des poneys');

        // Action
        $Poneys->addPoneyFromField($substract);

        // Assert
        $this->assertEquals($count, $Poneys->getCount());
    }

    public function addPoneysProviderFailure()
    {
        return array(
            array(8, 16),
            array(7, 10)
        );
    }

    /**
     * @dataProvider addPoneysProviderSuccess
     *
     * @return void
     */
    public function testAddPoneyFromFieldSucc($substract,$count)
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->addPoneyFromField($substract);

        // Assert
        $this->assertEquals($count, $Poneys->getCount());
    }

    public function addPoneysProviderSuccess()
    {
        return array(
            array(2, 10),
            array(3, 11),
            array(4, 12)
        );
    }



    public function test_getNames(){
        $names = ['Joe', 'William', 'Jack', 'Averell'];
        $this->poneys = $this->getMockBuilder('Poneys')->getMock();
        $this->poneys->expects($this->exactly(1))->method('getNames')->willReturn($names);
        $this->assertEquals($names, $this->poneys->getNames());
    }




}
?>
