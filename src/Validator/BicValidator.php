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


use IsoCodes\SwiftBic;

class BicValidator implements ValidatorInterface
{

    public static function validate($value, $params = [])
    {
        return SwiftBic::validate($value);
    }
}