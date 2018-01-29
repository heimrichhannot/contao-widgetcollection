<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @author  Thomas Körner <t.koerner@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */


namespace HeimrichHannot\WidgetCollection\Validator;


use Contao\System;
use IsoCodes\ZipCode;

class ZipCodeValidator implements ValidatorInterface
{

    public static function validate($value, $params = [])
    {
        try {
            return ZipCode::validate($value, $params['country']);
        } catch (\InvalidArgumentException $e)
        {
            System::log($e->getMessage(), __METHOD__, TL_ERROR);
            return false;
        }
    }
}