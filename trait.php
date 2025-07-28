<?php 
  class addition{
    public function add($a,$b){
        echo $a + $b . "<br>";
        $res = $this->add(2,3);
        echo $res;
    }
    
  }
  

//   class divided{
//     public static function divide($a,$c,$f){
//         echo $a % ($c+$f);
//     }
//   }
//   divided::divide(3,2,2);
?>