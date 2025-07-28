<?php 
    //payment Getway
    abstract class paymentGetway{
        abstract public function connect();
        abstract public function pay($amount);
        abstract public function disConnect();
        public function validate($amount_b){
            if($amount_b > 0){
                echo "This Is Valid Amout : $amount_b '<br>'";
            }else{
                echo "This Is Invalid Amout '<br>'";
            }
        }
    };

    //Bkash Getway
    class bkash extends paymentGetway{
        public function connect(){
            echo "Connected to Bkash API Key '<br>'";
        }
        public function pay($amount){
            echo "paying $amount via Bkash '<br>";
        }
        public function disConnect()
        {
            echo "disConnect from bkash";
        }
    }

    //Run Getway
    $bkashGetway = new bkash();
    echo $bkashGetway->connect();
    echo $bkashGetway->validate(500);
    echo $bkashGetway->pay(500);
    echo $bkashGetway->disConnect();
?>