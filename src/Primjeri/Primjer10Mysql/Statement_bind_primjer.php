<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "classicmodels", 3306);

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }




    $sql = "SELECT * FROM products WHERE products.`buyPrice` < 50 LIMIT 7";

$result =$mysqli->query($sql);

    if ($result->num_rows>0){
        $red=0;
        while ($row =$result->fetch_row()) {  // samo indeksi
           echo "rekord ".$red.") ";
           for ($i=0; $i <$result->field_count ; $i++) { 
           echo $row[$i].", "; 
           }
           $red++;
           echo PHP_EOL;
        }
    }

    //$sql = "SELECT * FROM products WHERE products.productName LIKE '%Ford%' AND buyPrice < 50 LIMIT 7";
    $sql = "SELECT productName, buyPrice FROM products WHERE products.productName LIKE ? AND buyPrice < ? LIMIT 7";
    $stmt=$mysqli->prepare($sql);

/*
Type specification chars
Character	Description
i	corresponding variable has type int
d	corresponding variable has type float
s	corresponding variable has type string
b	corresponding variable is a blob and will be sent in packets
*/
    
    $stmt->bind_param('si', $ime, $cijena);
    $ime='%Ford%';
    $cijena=50;
    
$stmt->execute();

printf("%d row inserted.\n", $stmt->affected_rows);  // samo kad insertamo ili dlete redova

    /* bind result variables */
    $stmt->bind_result($nekoime, $nekacijena);

    /* fetch values */
    while ($stmt->fetch()) {
        printf ("%s (%s)\n", $nekoime, $nekacijena);
    }

    /* close statement */
    $stmt->close();






    /* close connection */
    $mysqli->close();