<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/22/2019
 * Time: 17:45
 */

namespace Domain\User\Libraries;

interface QrGeneratorInterface
{
    public function generateQR($name);
}