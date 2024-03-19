<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Iterator;


class BookFactory 
{
    public static function napraviHrpuKnjiga($broj){
        $temp=[];
        for ($i=0; $i < $broj; $i++) { 
           $temp[]=new Book('Learning PHP Design Patterns', 'William Sanders');
        }
return $temp;

    }
}