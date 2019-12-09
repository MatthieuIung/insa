<?php
/**
 * Gestion de poneys
 */
class Poneys
{
    private $count = 8;

    /**
     * Retourne le nombre de poneys
     *
     * @return void
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Retire un poney du champ
     *
     * @param int $number Nombre de poneys à retirer
     *
     * @return void
     */
    public function removePoneyFromField(int $number)
    {
        if($number > $this->count){
            throw new Exception('Tu ne peux pas retirer des Poneys qui n existent pas');
        }
        else if($number < 0){
            throw new Exception('nombre négatifs');
        }
        $this->count -= $number;        
    }

    /**
     * Ajoute un poney du champ
     *
     * @param int $number Nombre de poneys à ajouter
     *
     * @return void
     */
    public function addPoneyFromField(int $number)
    {
        if(!$this->isFree($number)){
            throw new Exception('Plus de place pour des poneys');
        }
        $this->count += $number;
    }

    /**
     * Retourne les noms des poneys
     *
     * @return array
     */
    public function getNames()
    {

    }

    /**
     * Retourne si il reste des places dans le champs. true si dispo sinon false
     *
     * @return boolean
     */
    public function isFree($number)
    {
        if(($this->count+$number) < 15){
            return true;
        }
        return false; 
    }

}
?>
