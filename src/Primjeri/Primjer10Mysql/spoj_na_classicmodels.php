<?php

/* $mysqli = new mysqli("localhost", "user", "password", "database");

echo $mysqli->host_info . "\n"; */

$mysqli = new mysqli("127.0.0.1", "root", "", "classicmodels", 3306);

echo $mysqli->host_info . "\n";
printf("Server version: %s\n", $mysqli->server_info);
//print_r($mysqli->get_connection_stats());

$sql = "SELECT * FROM customers LIMIT 6";

$result =$mysqli->query($sql);

$row = $result->fetch_array(MYSQLI_NUM);
printf("%s (%s)\n", $row[0], $row[1]);
$row = $result->fetch_array(MYSQLI_NUM);
printf("%s (%s)\n", $row[0], $row[1]);
$row = $result->fetch_array(MYSQLI_ASSOC);
printf("%s (%s)\n", $row['customerName'], $row['addressLine1']);
// cini ovo do kraja fetch array 

if ($result->num_rows>0){
    while ($row =$result->fetch_assoc()) {  // samo asocijacije
      //  echo "redova:  ".$result->num_rows.PHP_EOL;
        echo "fetch_assoc:".$row['customerName'].", ".$row['addressLine1'].", ".$row['creditLimit'].", ".$row['customerNumber'].PHP_EOL;
       // print_r($row);
    }
}
$result->data_seek(0);  // ovo vraća pointer na početak resultseta

if ($result->num_rows>0){
    while ($row =$result->fetch_row()) {  // samo indeksi
       // print_r($row);
        echo "fetch_row:".$row[1].", ".$row[5].", ".$row[12].", ".$row[0].PHP_EOL;
    }
}

$result->data_seek(0);  // ovo vraća pointer na početak resultseta

if ($result->num_rows>0){
    while ($row =$result->fetch_array()) {  // i asocijacije i indekse
      //  print_r($row);
        echo "fetch_assoc:".$row['customerName'].", ".$row['addressLine1'].", [[".$row[4]."]], ".$row['creditLimit'].", ".$row['customerNumber'].PHP_EOL;
    }
}
echo PHP_EOL;
echo PHP_EOL;
echo "SVA POLJA INDEKSIRANI ISPIS".PHP_EOL;
$result->data_seek(0);  // ovo vraća pointer na početak resultseta

$fieldinfo = $result -> fetch_fields();

echo "DEBUG:::::: ".$fieldinfo [0]->name;  // Moze i ovako direktno

  foreach ($fieldinfo as $val) {
    printf("Name: %s\n", $val -> name);
 
    printf("Table: %s\n", $val -> table);
    printf("Max. Len: %d\n", $val -> max_length);
  }
if ($result->num_rows>0){
    $red=0;
    while ($row =$result->fetch_row()) {  // samo indeksi
       // print_r($row);
      
       echo "rekord ".$red.") ";
       for ($i=0; $i <$result->field_count ; $i++) { 
        //echo $row[$i].", ";  //echo "<td>".$row[$i]."</td> ";
        echo "<td>".$row[$i]."</td> ";
       }
       $red++;
       echo PHP_EOL;
       // echo "fetch_row:".$row[1].", ".$row[5].", ".$row[12].", ".$row[0].PHP_EOL;
    }
}


echo PHP_EOL;
echo PHP_EOL;
echo "SVA POLJA OBJEKTNI PRISTUP".PHP_EOL;
$result->data_seek(0);  // ovo vraća pointer na početak resultseta

while ($obj = $result -> fetch_object()) {
   // printf("%s (%s)\n", $obj->{'customer Name'}, $obj->addressLine1);  // Ovako ako u imenu fielda imamo razmak
    //print_r($obj);
   // var_dump($obj);
   printf("%s (%s)\n", $obj->customerName, $obj->addressLine1);
  }