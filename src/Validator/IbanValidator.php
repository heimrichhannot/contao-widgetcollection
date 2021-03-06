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
use IsoCodes\Iban;
use RuntimeException;

class IbanValidator implements ValidatorInterface
{
    /**
     * Validated an IBAN
     *
     * @param string $iban
     *
     * @return boolen|string true if valid, error message if invalid
     */
    public static function validate ($iban, $params = [])
    {
        try {
            return Iban::validate($iban);
        } catch (RuntimeException $e) {
            System::log($e->getMessage(), __METHOD__, TL_ERROR);
            return false;
        }
    }
}