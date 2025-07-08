<?php
    class BankAccountSimulator{

        public $balance;
        public $accountNumber;
        public $accountHolder;
        public $dataFile ='accounts.json';

        function __construct()
        {
            $this->balance  = 0;
        }

        public  function generateAccountNumber() {
                $file = "account_counter.txt";

                if (!file_exists($file)) {
                    file_put_contents($file, 1);
                }

                $current = (int) file_get_contents($file);
                $accountNumber = "ACC" . str_pad($current, 6, "0", STR_PAD_LEFT);
                file_put_contents($file, $current + 1);

                return $accountNumber;
        }

        public function createAccount(){

                $this->accountHolder = readline("Enter your name: ");
                $this->accountNumber = $this->generateAccountNumber();
                $this->balance = 0;

                $newAccount = [
                    "name" => $this->accountHolder,
                    "account_number" => $this->accountNumber,
                    "balance" => $this->balance
                ];

                $accounts = [];

                if (file_exists($this->dataFile)) {
                    $json = file_get_contents($this->dataFile);
                    $accounts = json_decode($json, true);
                }

                $accounts[] = $newAccount;

                file_put_contents($this->dataFile, json_encode($accounts, JSON_PRETTY_PRINT));
                echo "Account Created\n";

        }

        public function depositMoney() {

                if (!file_exists($this->dataFile)) {
                    echo " No accounts found.\n";
                    return;
                }

                $accNumber = readline("Enter Account Number:\n");

                $json = file_get_contents($this->dataFile);
                $accounts = json_decode($json, true);
                $found = false;

                foreach ($accounts as &$a) {
                    if ($a['account_number'] === $accNumber) {
                        $amount = readline("Enter the amount to deposit:\n");

                        if (!is_numeric($amount) || $amount <= 0) {
                            echo " Invalid amount.\n";
                            return;
                        }

                        $a['balance'] += $amount;
                        $found = true;
                        echo "₹$amount deposited successfully. New balance: ₹{$a['balance']}\n";
                        break;
                    }
                }

                if (!$found) {
                    echo "Account not found.\n";
                    return;
                }

                
                file_put_contents($this->dataFile, json_encode($accounts, JSON_PRETTY_PRINT));
        }


        public function withdrawMoney(){

             if (!file_exists($this->dataFile)) {
                    echo " No accounts found.\n";
                    return;
                }

                $accNumber = readline("Enter Account Number:\n");

                $json = file_get_contents($this->dataFile);
                $accounts = json_decode($json, true);
                $found = false;

                foreach ($accounts as &$a) {
                    if ($a['account_number'] === $accNumber) {
                        $amount = (int)(readline("Enter the amount to withdraw:\n"));

                        if (!is_numeric($amount) || $a['balance'] <= $amount) {
                            echo " insufficient  amount.\n";
                            return;
                        }

                        $a['balance'] -= $amount;
                        $found = true;
                        echo "₹$amount withdrawed successfully. New balance: ₹{$a['balance']}\n";
                        break;
                    }
                }

                if (!$found) {
                    echo "Account not found.\n";
                    return;
                }

                
                file_put_contents($this->dataFile, json_encode($accounts, JSON_PRETTY_PRINT));
        }



    }

    $object = new BankAccountSimulator();

    echo "-------------WELCOME------------\n";

    while (true) {
    echo "\n1. Create Account\n2. Deposit Money\n3. Withdraw \n 4.Exit\n";
    $choice = readline("Choose: ");

    switch ($choice) {
        case 1:
            $object->createAccount();
            break;
        case 2:
            $object->depositMoney();
            break;
        case 3:
        
            $object->withdrawMoney();
            break;
        case 4:
            exit;
        
        default:
            echo "Invalid choice.\n";
    }
 }
?>