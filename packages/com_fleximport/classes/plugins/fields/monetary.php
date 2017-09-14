<?php
/**
 *
 * @version 2.0
 * @package Joomla
 * @subpackage flexIMPORT
 * @copyright (C) 2011 NetAssoPro - www.netassopro.com
 * @license GNU/GPL v2
 *
 * flexIMPORT is a addon for the excellent FLEXIcontent component. Some part of
 * code is directly inspired.
 * @copyright (C) 2009 Emmanuel Danan
 * see www.vistamedia.fr for more information
 *
 * flexIMPORT is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
defined('_JEXEC') or die;
require_once(JPATH_COMPONENT.'/classes/plugins/field.php');
class fleximportPluginmonetary extends fleximportFieldPlugin {
	public function formatValues()
	{

		// ajout du pr�fixe et suffixe
		$fieldValues = array();
		foreach ($this->_fieldValues as $fieldValue){
            $fieldValue = (float)$fieldValue;
		    if ($this->_fieldParams->get('integer_convert',0)){
                $fieldValue = (int)$fieldValue / (int)("1".str_pad('0',(int)$this->_fieldParams->get('integer_convert',0)));
            }
            $fieldValue = number_format($fieldValue,$this->_fieldParams->get('decimal',2),$this->_fieldParams->get('decimal_separator','.'),$this->_fieldParams->get('thousand_separator',''));
            if ($this->_fieldParams->get('currency_position','after')=='after'){
                $fieldValue = $fieldValue .$this->_fieldParams->get('currency_symbol','€');
            }else{
                $fieldValue =  $this->_fieldParams->get('currency_symbol','€').$fieldValue;
            }
			$fieldValues[] = $fieldValue;
		}
		$this->_fieldValues = $fieldValues;
	}
}
