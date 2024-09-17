<?php

class DBController
{
    protected $con = null;
    public function __construct()
    {
        $this->con = mysqli_connect("localhost","root","321*#LDtr!?*ktasb","db_bill"); // assign the value to variable
    }

}