<?php

$host ="127.0.0.1";
$dbname="testpdo";
$username="root";
$password="";

// In this example we are using MySQL but this applies to any database that has support for transactions
$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $username, $password);    

// Make sure that PDO will throw an exception in case of error to make error handling easier
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // From this point and until the transaction is being committed every change to the database can be reverted
    $db->beginTransaction();    
    
    // Insert the metadata of the order into the database
    $preparedStatement = $db->prepare(
        'INSERT INTO `orders` (`order_id`, `name`, `address`, `created_at`)
         VALUES (:name, :address, :telephone, :created_at)'
    );
    
$name="Mirko";
$address="vinkovacka 34";
$telephone="+3851223234";

    $preparedStatement->execute([
        'name' => $name,
        'address' => $address,
        'telephone' => $telephone,
        'created_at' => time(),
    ]);
    
    // Get the generated `order_id`
    $orderId = (int)$db->lastInsertId();

    // Construct the query for inserting the products of the order
    $insertProductsQuery = 'INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`) VALUES';
    
    $products=[22,56=>55];
print_r($products);
    $count = 0;
    foreach ( $products as $productId => $quantity ) {
        $insertProductsQuery .= ' (:order_id' . $count . ', :product_id' . $count . ', :quantity' . $count . '),';
        
        $insertProductsParams['order_id' . $count] = $orderId;
        $insertProductsParams['product_id' . $count] = $productId;
        $insertProductsParams['quantity' . $count] = $quantity;
        
        ++$count;
    }
    
echo $insertProductsQuery;

// budući da u petlji na kraju ostaje TRAILLING COMMA problem, moramo maknuti zarez na kraju
$insertProductsQuery = rtrim($insertProductsQuery, ',');

    // Insert the products included in the order into the database
    $preparedStatement = $db->prepare($insertProductsQuery);
    $preparedStatement->execute($insertProductsParams);
    
    // Make the changes to the database permanent
    $db->commit();
}
catch ( PDOException $e ) { 
    // Failed to insert the order into the database so we rollback any changes
    $db->rollback();
    throw $e;
}