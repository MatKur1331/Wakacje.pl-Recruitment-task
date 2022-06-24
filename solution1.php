<?php

function printList($limit,$array,$type){
    $array = array_count_values($array);
    arsort($array);
    echo "Najczęściej występujące $type";
    echo "<ol>";
    foreach ($array as $key => $val)
    {
            if($limit>0)
            {
                echo "<li>$key $val wystąpień</li>";
                $limit--;
            }
            else break;
    }
    echo "</ol>";
}

$file = file('php_internship_data.csv');
$names = array();
$dates = array();
//split dates and names
    foreach($file as $line)
    {
        $line = trim($line);
        $row = explode(",",$line);
        $name = ucfirst(strtolower($row[0]));
        array_push($names,$name);
        if($row[1]>='2000-01-01')
        {        
            $row[1] = date('d.m.Y',strtotime($row[1]));
            array_push($dates,$row[1]);
        }
    }
    printList(10,$names,'imiona');
    printList(10,$dates,'daty');

?>