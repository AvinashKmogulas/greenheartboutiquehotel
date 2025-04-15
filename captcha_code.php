<?php
    
    $pattern = "GA0a!b1|cBdN@efg2hCiH3`jkD#1P4OmM%n^JVo\Q5pRE_<q=)SIK9rs6&tT*uUF,L-(vZ/7w~Wx+8yX>zY";
    $length = strlen($pattern)-1;
    $captch_code = [];
    for($i=0;$i<6;$i++)
    {
        $index = rand(0,$length);
        $captch_code[] = $pattern[$index];
    }
    echo implode($captch_code);
?>