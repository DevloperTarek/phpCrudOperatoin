<?php 
    interface AuthInterface{
        public function registration($email,$password);
        public function login($email,$password);
    }
?>