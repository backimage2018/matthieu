<?php

namespace App\tests\Util;

use Doctrine\Bundle\DoctrineCacheBundle\Tests\TestCase;
use App\Entity\Products;

class PanierTest extends TestCase
{

    public function testAdd()
    {
        $p1 = new Products();
        $p2 = new Products();
        
        $p1->prixActuel(21);
        echo '<pre>';
        var_dump($p1);
        echo '</pre>';
        $p2->prixActuel(21);
        echo '<pre>';
        var_dump($p2);
        echo '</pre>';
        $result = $p1 + $p2;
        
        return $p1 + $p2;
        
    }
    
    public function testRemove()
    {
        
    }
    
}