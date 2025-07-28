<?php 
  class addition{
    public static function add($a,$b){
        echo $a + $b . "<br>";
    }
  }
  addition::add(4,12) . "<br>";

  class divided{
    public static function divide($a,$c,$f){
        echo $a % ($c+$f);
    }
  }
  divided::divide(3,2,2);
?>