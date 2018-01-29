<?php
/**
 * Created by PhpStorm.
 * User: mkunitzsch
 * Date: 04.08.17
 * Time: 15:10
 */

namespace HeimrichHannot\WidgetCollection\FrontendWidget;

use CMPayments\IBAN;
use Contao\Encryption;
use HeimrichHannot\BankingWidgets\Validator\IbanValidator;
use HeimrichHannot\FormHybrid\FrontendWidget;

class IbanFrontendWidget extends FrontendWidget
{
	protected $blnSubmitInput = true;
	
	protected $strTemplate = 'iban_frontend_widget';

    /**
     * @var IbanValidator
     */
	protected $validator;

    public function __construct($arrData)
    {
        parent::__construct($arrData);
        $this->validator = new IbanValidator();
        $this->fields = 22;
    }


    /**
	 * @param mixed $varInput
	 *
	 * @return string
	 */
	public function validator($varInput)
	{
		if(!is_array($varInput))
			return '';
		
		$this->blnSubmitInput = false;
		$this->varValue = implode('',$varInput);
		
		if(in_array('',$varInput))
			$this->addError(sprintf($GLOBALS['TL_LANG']['ERR']['bankingWidgetsLength'], $this->fields));
		
		if($this->hasMultipleEntry($varInput))
			$this->addError($GLOBALS['TL_LANG']['ERR']['bankingWidgetsStrlen']);

		if (!(true === $this->validator->validate($this->varValue)))
		{
		    $this->addError($GLOBALS['TL_LANG']['ERR']['bankingWidgetsIbanInvalid']);
        }
		
		if (!$this->hasErrors())
		{
			$this->blnSubmitInput = true;
			
			return $this->varValue;
		}

		return '';
	}

	public function parse($arrAttributes=null)
    {
        $dca = $this->dataContainer->getDca();
        $this->help = $dca['fields'][$this->strName]['help'];
        return parent::parse($arrAttributes);
    }
	
	/**
	 * @return string
	 */
	public function generate()
	{
		if('' != $this->varValue)
        {
            $singleInputs = str_split(Encryption::decrypt($this->varValue), 1);
        }

		$field = '<div class="singleInput-wrapper">';
		$seperate = [4,8,12,16,20];
		
		for($i=0;$i<$this->fields;$i++)
		{
		    $style = "";
            if (in_array(($i+1), $seperate))
            {
                $style = 'style="margin-right: 10px;"';
            }
			$value = \Input::post($this->strName)[$i] ?: $singleInputs[$i];
			$field .= '<input type="text" minlength="1" maxlength="1" 
			            name="'. $this->strName .'[' . $i . ']" data-parent="'. $this->strName .'" 
			            id="ctrl_'. $this->strId .'_' . $i .'" 
			            class="singleInput singleInput_' . $i . '" 
			            value="'.$value.'" 
			            '.$style.'>';
		}
		
		$field .= '</div>';
		
		return $field . $this->addSubmit();
	}
	
	/**
	 * @param $values array
	 *
	 * @return bool
	 */
	protected function hasMultipleEntry(array $values)
	{
		foreach($values as $input)
		{
			if(strlen($input)>1)
				return true;
		}
		
		return false;
	}

    /**
     * Generate the label and return it as string
     *
     * @return string The label markup
     */
    public function generateLabel()
    {
        if ($this->strLabel == '')
        {
            return '';
        }
        return sprintf('<label%s%s>%s%s%s%s</label>',
            ($this->blnForAttribute ? ' for="ctrl_' . $this->strId . '"' : ''),
            (($this->strClass != '') ? ' class="' . $this->strClass . '"' : ''),
            ($this->mandatory ? '<span class="invisible">'.$GLOBALS['TL_LANG']['MSC']['mandatory'].' </span>' : ''),
            $this->strLabel,
            ($this->mandatory ? '<span class="mandatory">*</span>' : ''),
            ($this->help ? '<span class="help-tooltip" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="'.$this->help.'"></span>' : '')
        );
    }


}