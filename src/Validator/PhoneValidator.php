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


use IsoCodes\PhoneNumber;

class PhoneValidator implements ValidatorInterface
{

    /**
     * Validates a phone number against given countries.
     *
     * @param $value
     * @param array $params
     * @return bool
     */
    public static function validate($value, $params = [])
    {
        $isValidNumber = false;
        if (!isset($params['countries']))
        {
            $params['countries'] = [null];
        }
        foreach ($params['countries'] as $country)
        {
            if (true === $isValidNumber = PhoneNumber::validate($value, $country))
            {
                break;
            }
        }
        return $isValidNumber;
    }
}