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


use DateTime;

class BirthdayValidator implements ValidatorInterface
{

    /**
     * @param $value
     * @param array $params keys: format,
     * @return bool
     */
    public static function validate($value, $params = [])
    {
        $format = $params['format'] ?: 'd.m.Y';
        $minAge = $params['minAge'] ?: 0;
        $maxAge = $params['maxAge'] ?: 0;

        $date = DateTime::createFromFormat($format, $value);
        if (false === ($date && $date->format($format) == $value))
        {
            return false;
        }

        if ($minAge > 0)
        {
            $maxDate = DateTime::createFromFormat("Y-m-d", (date("Y") - $minAge).date("-m-d"));

            if ($date > $maxDate)
            {
                return false;
            }
        }
        if ($maxAge > 0)
        {
            $maxDate = DateTime::createFromFormat("Y-m-d", (date("Y") - $maxAge).date("-m-d"));

            if ($date < $maxDate)
            {
                return false;
            }
        }

        return true;

    }
}