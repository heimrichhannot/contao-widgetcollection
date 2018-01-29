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


use CMPayments\IBAN;

class IbanValidator
{
    /**
     * Validated an IBAN
     *
     * @param string $iban
     *
     * @return boolen|string true if valid, error message if invalid
     */
    public static function validate ($iban)
    {
        $iban = new IBAN($iban);
        if (!$iban->validate($error))
        {
            return $error;
        }

        return true;
    }
}