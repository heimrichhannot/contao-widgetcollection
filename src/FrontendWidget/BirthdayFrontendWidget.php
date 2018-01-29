<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @author  Thomas Körner <t.koerner@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */


namespace HeimrichHannot\WidgetCollection\FrontendWidget;


use Contao\FormTextField;
use HeimrichHannot\WidgetCollection\Validator\BirthdayValidator;

class BirthdayFrontendWidget extends FormTextField
{
    public function validator($varInput)
    {
        $value = parent::validator($varInput);
        if ($this->hasErrors())
        {
            return $value;
        }
        if (!BirthdayValidator::validate($varInput, [
            'minAge' => $this->minAge ?: 0,
            'format' => $this->format ?: 'd.m.Y'
        ])
        )
        {
            $this->addError(str_replace('%i%', $this->minAge ?: 0, $GLOBALS['TL_LANG']['ERR']['widgetcollection']['birthdayNotValid']));
        }
        return $value;
    }

}