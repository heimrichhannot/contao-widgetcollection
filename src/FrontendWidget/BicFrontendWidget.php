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
use HeimrichHannot\WidgetCollection\Validator\BicValidator;

class BicFrontendWidget extends FormTextField
{
    /**
     * @var BicValidator
     */
    public $validator;

    public function __construct(array $arrAttributes = null)
    {
        parent::__construct($arrAttributes);
        $this->validator = new BicValidator();
    }


    public function validator($varInput)
    {
        $value = parent::validator($varInput);
        $validator = $this->validator;
        if ($this->hasErrors())
        {
            return $value;
        }
        if (!$validator::validate($varInput))
        {
            $this->addError($GLOBALS['TL_LANG']['ERR']['widgetcollection']['bicNotValid']);
        }
        return $value;
    }

}