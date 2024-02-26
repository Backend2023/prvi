<?php
    $mysqli = new mysqli("localhost", "my_user", "my_password", "world");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $mysqli->query("CREATE TABLE Language LIKE CountryLanguage");

    /* set autocommit to off */
    $mysqli->autocommit(FALSE);

    /* Insert some values */
    $mysqli->query("INSERT INTO Language VALUES ('DEU', 'Bavarian', 'F', 11.2)");
    $mysqli->query("INSERT INTO Language VALUES ('DEU', 'Swabian', 'F', 9.4)");

    /* commit transaction */
    $mysqli->commit();

    /* drop table */
    $mysqli->query("DROP TABLE Language");

    /* close connection */
    $mysqli->close();