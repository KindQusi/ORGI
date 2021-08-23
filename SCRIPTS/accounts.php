<?php

class Account
{
    // Podstawowe dane
    private $nick;
    private $email;
    private $id;

    // Konstruktor
    public function __construct($nick , $email , $id)
    {
        $this->nick  = $nick;
        $this->email = $email;
        $this->id    = $id;
    }

    public function GetUserId()
    {   return $this->id;   }

    public function GetUserNick()
    {   return $this->nick;   }
    
}
?>