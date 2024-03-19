<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\StaticFactory;

use InvalidArgumentException;

/**
 * Note1: Remember, static means global state which is evil because it can't be mocked for tests
 * Note2: Cannot be subclassed or mock-upped or have multiple different instances.
 */
final class StaticFactory
{
    // kao povratni tip mogu navesti zajednicki interface:
  //  public static function factory(string $type): Formatter
    
    // Ili striktno navesti imena klasa koje metoda može vratiti:
   public static function factory(string $type): FormatNumber|FormatString
    {
        return match ($type) {
            'number' => new FormatNumber(),
            'string' => new FormatString(),
            default => throw new InvalidArgumentException('Unknown format given'),
        };
    }
     public static function factoryMassProduce(string $type, int $komada): array
    {
         $temp=[];
         for ($index = 0; $index < $komada; $index++) {
             $temp[]= self::factory($type);
         }       
         return $temp;
  
    }
}
