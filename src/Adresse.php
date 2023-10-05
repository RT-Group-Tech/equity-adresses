<?php
namespace Rtgroup\PayrollAdresses;

use Rtgroup\Dbconnect\Dbconfig;
use Rtgroup\Dbconnect\Dbconnect;

class Adresse
{
    private Dbconnect $dbconnect;

    private $province;
    private $commune;
    private $quartier;
    private $avenue;
    private $numero;

    public function __construct($province,$commune,$quartier,$avenue,$numero)
    {
        global $dbconnect;

        $this->dbconnect=$dbconnect;

        $this->province=$province;
        $this->commune=$commune;
        $this->quartier=$quartier;
        $this->avenue=$avenue;
        $this->numero=$numero;
    }

    /**
     * Enregistrer une adresse dans la db.
     * @return $id: l'id de l'adresse.
     */
    public function save()
    {
        $this->dbconnect->setTable("adresses");

        $data['province']=$this->province;
        $data['commune']=$this->commune;
        $data['quartier']=$this->quartier;
        $data['avenue']=$this->avenue;
        $data['numero']=$this->numero;

        $id=$this->dbconnect->insert($data);

        return $id;
    }

    /**
     * Recuperer une adresse de la db par son ID.
     * @param $adressId
     * @return mixed|null
     */
    public function get($adressId)
    {
        $this->dbconnect->where("adresse_id","=",$adressId);

        $ad=$this->dbconnect->select();
        if(!$ad)
        {
            return null;
        }
        $ad=$ad[0];

        return $ad;
    }
}