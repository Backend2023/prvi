<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "classicmodels", 3306);

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


    $mysqli->query("CREATE TABLE IF NOT EXISTS produkti LIKE productlines");

    /* set autocommit to off */
    $mysqli->autocommit(FALSE);

    /* Insert some values */
    $mysqli->query("INSERT INTO produkti VALUES ('DEU', 'Bavarian', 'F',NULL)");
    $mysqli->query("INSERT INTO produkti VALUES ('EN', 'Swabian', 'F',NULL)");

    /* commit transaction */
    $mysqli->commit();


    $sql = "SELECT * FROM produkti";

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



    /* drop table */
    $mysqli->query("DROP TABLE produkti");

    /* close connection */
    $mysqli->close();