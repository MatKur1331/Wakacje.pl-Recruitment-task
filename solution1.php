<?php
$file = file('php_internship_data.csv');
$names = array();
$dates = array();
    foreach($file as $line)
    {
        $line = trim($line);
        $row = explode(",",$line);
        $line = $row[0];
        $line = ucfirst(strtolower($line));
        array_push($names,$line);
    }
    $names = array_count_values($names);
    arsort($names);
        $limit=10;
        echo "Najczęściej występujące imiona";
        echo "<ol>";
        foreach ($names as $key => $val)
        {
                if($limit>0)
                {
                    echo "<li>$key $val wystąpień</li>";
                    $limit--;
                }
                else break;
        }
        echo "</ol>";
?>