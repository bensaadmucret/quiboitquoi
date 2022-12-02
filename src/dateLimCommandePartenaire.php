<?php declare(strict_types=1);

namespace Ben\Quiboitquoi;

class dateLimCommandePartenaire {
    /**
     * @var string $dateLimCommandePartenaire
     * @return array
     */
    public static function getDateLimite($date): array {
        $dateLimite = [];
        foreach ($date as $key => $value) {
           foreach ($value['planningCommande'] as $key => $value) {
               //dump($value['dateLimCommandePartenaire']);
                $dateLimite[] = $value['dateLimCommandePartenaire'];
           }

        }
        
        return $dateLimites = array_unique($dateLimite);
        //return $dateLimites = array_unique($dateLimite, SORT_REGULAR);

    }

   

}


