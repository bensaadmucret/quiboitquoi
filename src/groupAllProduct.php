<?php declare(strict_types=1);

namespace Ben\Quiboitquoi;
use Ben\Quiboitquoi\filterAndCompact;
use Ben\Quiboitquoi\decodeJsonWithException;
use Ben\Quiboitquoi\dateLimCommandePartenaire;
use PHPUnit\Util\Json;

class groupAllProduct { 
    /**
     * On construit un tableau avec les produits et les dates de livraison
     * On concatène les produits de tous les partenaires
     * @var $groupAllProduct
     * @return array
     */
    public function groupAllProductInArray($data):array {
        $all_product = [];
        foreach ($data as $key => $value):
          if(is_array($value)):
          foreach( $value as $key => $v):
            $v['irefcVls'] = $v['irefc'] . $v['vl'];
            $irefcVls[] =  $v['irefcVls'];
            foreach ($v['planningCommande'] as $key => $value):
                $dateLivraison[] = $value['dateLivraison'];
                $all_product[] = array_merge($v, $value);
            endforeach;
            endforeach;
           
          endif;
        endforeach;

        return $all_product;
        
    }


    /**
     * @return false|string
     */
    public function LivraisonPossible():string
    {

        $data = file_get_contents('data.json');
        $data = decodeJsonWithException::decodeData($data);
        $data_filter = filterAndCompact::filterData($data);
        $date_limite = dateLimCommandePartenaire::getDateLimite($data_filter);
        $all_product = $this->groupAllProductInArray($data);
        $dateLimite = min($date_limite);
        $dateLimite = date('Y-m-d', strtotime($dateLimite));
  
        $premierDate['premiereDate'][]= $dateLimite;
        $premierDate['livraisons']['dateLimCommandePartenaire'] = $dateLimite;
        foreach($all_product as $key => $value):
          $uniqueArray = array_unique($all_product[$key] , SORT_REGULAR);
          foreach($uniqueArray as $key => $value):
            if($key === 'irefcVls'):
              $irefcVls[] = $value;
              $unique = array_unique($irefcVls);
               //dump($unique);
                $unique = array_values($unique);
              $premierDate['irefcVls'] = $unique;
            endif;
           endforeach;
        endforeach;

        $datePossibleJson = json_encode($premierDate, JSON_PRETTY_PRINT);

        return $datePossibleJson;

       
    }

}

