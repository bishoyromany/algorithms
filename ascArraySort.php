<?php 
  function ascSort($arr){
      for($i=0; $i < count($arr); $i++){
          $val = $arr[$i];
          $j = $i-1;
          while($j >= 0 && $arr[$j] > $val){
              $arr[$j+1] = $arr[$j];
              $j--;
          }
          $arr[$j+1] = $val;
      }
      return $arr;
  }
  $marr = array(3, 0, 2, 5, -1, 4, 1);
  echo "Original Array :\n";
  echo implode(', ',$marr );
  echo "\nSorted Array :\n";
  print_r(ascSort($marr));
