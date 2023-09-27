<?php
namespace Rtgroup\PayrollAdresses;

use Rtgroup\Dbconnect\Dbconfig;
use Rtgroup\Dbconnect\Dbconnect;

class Adresse
{
    private Dbconnect $dbconnect;

    public function __construct($province,$commune,$quartier,$avenue,$numero)
    {
        new Dbconfig()
    }
}