<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Ben\Quiboitquoi\filterAndCompact;
use Ben\Quiboitquoi\dateLimCommandePartenaire;

class dateLimCommandePartenaireTest extends TestCase
{
   


    public function testInstanceOf()
    {
        $this->assertInstanceOf(dateLimCommandePartenaire::class, new dateLimCommandePartenaire());
    }

   public function testUniqueDate()
   {
        $data = file_get_contents('data.json');
        $data = json_decode($data, true);
        $data_filter = filterAndCompact::filterData($data);

        $dateLimite = dateLimCommandePartenaire::getDateLimite($data_filter);
        $this->assertEquals(3, count($dateLimite));

    }



}