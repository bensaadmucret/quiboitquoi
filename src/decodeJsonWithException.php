<?php declare(strict_types=1);

namespace Ben\Quiboitquoi;

use Ben\Quiboitquoi\exception\NoDataJson;
use Ben\Quiboitquoi\exception\NoDataFound;
use Ben\Quiboitquoi\exception\NoDataFormat;



class decodeJsonWithException  {

    /**
     * @var string $data
     * @return array
     * @throws NoDataJson
     * @throws NoDataFound
     * @throws NoDataFormat
     */
    public static function decodeData($data): array {
        try {
            $data = json_decode($data, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new NoDataJson('Le format du fichier n\'est pas du JSON');
            }
            if (empty($data)) {
                throw new NoDataFound('Le fichier est vide');
            }
            if (!isset($data['produits'])) {
                throw new NoDataFormat('Le fichier ne contient les bonnes données');
            }
            return $data;
        } catch (NoDataJson $e) {
            echo $e->getMessage();
        } catch (NoDataFound $e) {
            echo $e->getMessage();
        } catch (NoDataFormat $e) {
            echo $e->getMessage();
        }
    }

}