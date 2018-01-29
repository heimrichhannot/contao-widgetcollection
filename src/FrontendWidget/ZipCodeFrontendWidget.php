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
use HeimrichHannot\WidgetCollection\Validator\ZipCodeValidator;

class ZipCodeFrontendWidget extends FormTextField
{
    protected $blnSubmitInput = true;

    protected $strTemplate = 'form_textfield';

    public function validator($value)
    {
        $value = parent::validator($value);
        if ($this->hasErrors()) {
            return $value;
        }
        if (!$this->countries || !is_array($this->countries))
        {
            if (is_string($this->countries))
            {
                $this->countries = [$this->countries];
            }
            else {
                $this->countries = ['DE'];
            }
        }
        $isValid = false;
        foreach ($this->countries as $country)
        {
            if (true === $isValid = ZipCodeValidator::validate($value, ['country' => $country]))
            {
                break;
            }
        }
        if (!$isValid)
        {
            $this->addError($GLOBALS['TL_LANG']['ERR']['widgetcollection']['postalNotValid']);
        }
        return $value;
    }


}