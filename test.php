<h2>Prime numbers</h2>
<?php
for($i=1;$i<100;$i++)
{
    $check=0;
    for($j=2;$j<=$i-1;$j++){
        if($i%$j==0){
            $check=1;
            break;
        }
    }
    if($check==0){
        echo $i;
        echo "\n";
    }
}
?>
<h2>Max Min and duplicate in an array</h2>
<?php
    $array=array(3,4,1,7,5,6,2,3);
    $count=count($array);
    $max=$array[0];
    for($i=1;$i<$count;$i++){
        if($max<$array[$i]){
            $max=$array[$i];
        }
    }
$min=$array[0];
    for($i=1;$i<$count;$i++){
        if($min>$array[$i]){
            $min=$array[$i];
        }
    }
    $duplicate=000;
    for($i=0;$i<$count;$i++){
        for($j=$i+1;$j<$count;$j++){
            if($array[$i]==$array[$j]){
            $duplicate=$array[$j];
                break;
        }
        
        }
    }
echo "Maximum value is ".$max."<br>";
echo "Minimum value is ".$min."<br>";
echo "Duplicate value is ".$duplicate;
?>