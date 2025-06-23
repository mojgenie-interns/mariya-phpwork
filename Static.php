<?php
    class BankAccount
    {
        public static $totalAccount=0;
        public function __construct()
        {
            self::$totalAccount++;
        }
        public static function getTotalAccount()
        {
            echo " total students created ",self::$totalAccount;

        }
    }
    $obj1=new BankAccount();
    $obj2= new BankAccount();
    BankAccount::getTotalAccount();
    