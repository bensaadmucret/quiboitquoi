<?php declare(strict_types=1);


namespace Ben\Quiboitquoi;

class filterAndCompact {

    /**
     * On retire ce qui n'est pas nécessaire
     * @var array $data
     * @return array
     */
    public static function filterData($data): array {
        $data_filter = [];
        foreach ($data as $key => $value) {
            if(is_array($value)):
            $data_filter = array_merge($data_filter, $value);
            endif;
        }
        return $data_filter;
       
    }

}