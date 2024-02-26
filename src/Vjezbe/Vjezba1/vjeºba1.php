<?php

// Declare the class
class User 
{
 
    // properties
    public $name; 
    
    // method that return $name
    public function getName()
    {
        return $this->name;
    }
}
 
// Create an instance
$user = new User();
$user->name = 'Ivica';
echo $user->getName();