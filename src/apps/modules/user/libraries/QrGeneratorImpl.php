<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/22/2019
 * Time: 17:48
 */

namespace App\User\Libraries;

use Domain\User\Libraries\QrGeneratorInterface;

include(APP_PATH . '/library/phpqrcode/qrlib.php');

class QrGeneratorImpl implements QrGeneratorInterface
{
    public function generateQR($name)
    {
        // TODO: Implement generateQR() method.
        $existPath = BASE_PATH . '/public/images/' .$name;
        if (!file_exists($existPath) || is_null($name) ){
            $uuid = uniqid();
            $imgPath = $uuid . '.png';
            $newPath = BASE_PATH . '/public/images/' . $imgPath;

            \QRcode::png($uuid, $newPath);
            echo 'File generated!';
            return $imgPath;
        } else {
            echo 'File already exists!';
//            return $existPath;
            return null;
        }

        return null;
    }
}