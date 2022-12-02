<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Ben\Quiboitquoi\exception\NoDataJson;
use Ben\Quiboitquoi\exception\NoDataFound;
use Ben\Quiboitquoi\exception\NoDataFormat;
use Exception;


class decodeJsonWithExceptionTest extends TestCase
{
    
    public function testFileExist()
    {
        $this->assertFileExists('data.json');

    }

  
    public function testFileIsReadable()
    {
        $this->assertFileIsReadable('data.json');

    }

    
    public function testFileIsNotEmpty()
    {
        $this->assertFileIsReadable('data.json');

    }

    public function testFileIsEmpty()
    {
        $data = '';
        $this->assertEmpty($data);

    }

  
    public function testExceptionNoDataJson()
    {
        $data = 'string';
        $data = json_decode($data, true);
        $this->assertNotEquals(JSON_ERROR_NONE, json_last_error());

    }

    public function testExceptionNoDataFound()
    {
      
        $this->expectException(NoDataFound::class);
       
        if (empty($data)) {
            throw new NoDataFound('Le fichier est vide');
        }

    }

    
    public function testExceptionNoDataFormat()
    {
       
        $this->expectException(NoDataFormat::class);
       
        if (!isset($data['produits'])) {
            throw new NoDataFormat('Le fichier ne contient les bonnes données');
        }

    }

}