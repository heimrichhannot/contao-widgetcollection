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

class IbanWidget extends TextField
{
    public function validator($varInput)
    {
        return parent::generate($varInput);
    }


}