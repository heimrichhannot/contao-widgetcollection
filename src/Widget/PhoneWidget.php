<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @author  Thomas Körner <t.koerner@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */


namespace HeimrichHannot\WidgetCollection\Widget;


use Contao\TextField;
use HeimrichHannot\WidgetCollection\Validator\PhoneValidator;

class PhoneWidget extends TextField
{
    public function validator($value)
    {
        $value = parent::validator($value);
        if ($this->hasErrors()) {
            return $value;
        }
        if (!PhoneValidator::validate($value, [
            'countries' => $this->countries ?: null
        ]))
        {
            $this->addError(str_replace(
                '%s%',
                $this->countries
                    ? $GLOBALS['TL_LANG']['ERR']['widgetcollection']['phoneNumberNotValid_in'].explode(', ', $this->countries)
                    : '',
                $GLOBALS['TL_LANG']['ERR']['widgetcollection']['phoneNumberNotValid']
            ));
        }
        return $value;
    }
}