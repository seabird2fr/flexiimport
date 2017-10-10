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
class fleximportPlugingooglemap extends fleximportFieldPlugin {
	public function formatValues()
	{
		$googlemapSeparator = $this->_fieldParams->get('googlemap_separator', '::');

   
		
		// si l'on doit explos� les donn�es
		if (count($this->_fieldValues) ) {
			// supprime les valeurs nulles
			foreach ($this->_fieldValues as $index => $value){
				if (!$value)
					unset($this->_fieldValues[$index]);
			}
			$nbValues = count($this->_fieldValues);
			// on va reformater les groupes de valeurs
			$LinkValues = @array_chunk($this->_fieldValues, (int) $nbValues );

			// si on a bien le m�me nombre de valeur
			if ($LinkValues && count($LinkValues[0]) == count($LinkValues[1])) {
				$this->_fieldValues = array();
				// si par d�faut on importe pas le compteur, alors on met le compteur � 0
			
					$LinkValues[2]=array_fill(0,count($LinkValues[0]),0);
				// cr�ation des nouvelles valeurs
				foreach ($LinkValues[0] as $indexValue => $LinkValue) {
					$this->_fieldValues[] = trim($LinkValue) . $googlemapSeparator . trim($LinkValues[1][$indexValue]) . $googlemapSeparator . trim($LinkValues[2][$indexValue]);
				}
			}
		}
		
$txt = print_r($result_from_erp, true);  // mettre le résultat de print_r() dans une variable avec le paramètre true
$f = fopen('mon_fichier.log', "a");    // ouverture du fichier
fwrite($f, $txt);                        // écriture dans le fichier
fclose($f);   

		// pour chaque link
		foreach ($this->_fieldValues as &$value) {
			$valueLink = explode($googlemapSeparator, $value);
			$value = array();
			// s'il y a un lien et un titre et le compteur
			if (count($valueLink) == 7 ) {
				$value['addr_display'] = $valueLink[0];
				$value['addr1'] = $valueLink[0];
				$value['city'] = $valueLink[1];
				$value['lat'] = $valueLink[2];
				$value['lon'] = $valueLink[3];
				$value['province'] = $valueLink[4];
				$value['zip'] = $valueLink[5]; // Code postal
				$value['country'] = $valueLink[6];  // ex country ="FR"
				// seulement le lien et le titre
			}
			elseif (count($valueLink) == 6 ) {
				$value['addr_display'] = $valueLink[0];
				$value['addr1'] = $valueLink[0];
				$value['city'] = $valueLink[1];
				$value['lat'] = $valueLink[2];
				$value['lon'] = $valueLink[3];
				$value['province'] = $valueLink[4];
				$value['zip'] = $valueLink[5];
				// seulement le lien et le titre
			}
			elseif (count($valueLink) == 5 ) {
				$value['addr_display'] = $valueLink[0];
				$value['addr1'] = $valueLink[0];
				$value['city'] = $valueLink[1];
				$value['lat'] = $valueLink[2];
				$value['lon'] = $valueLink[3];
				$value['province'] = $valueLink[4];
				// seulement le lien et le titre
			}
			elseif (count($valueLink) == 4 ) {
				$value['addr_display'] = $valueLink[0];
				$value['addr1'] = $valueLink[0];
				$value['city'] = $valueLink[1];
				$value['lat'] = $valueLink[2];
				$value['lon'] = $valueLink[3];
				// seulement le lien et le titre
			}
			elseif (count($valueLink) == 3 ) {
				$value['addr_display'] = $valueLink[0];
				$value['addr1'] = $valueLink[0];
				$value['city'] = $valueLink[1];
				$value['hits'] = $valueLink[2];
				// seulement le lien et le titre
			} elseif (count($valueLink) == 2 ) {
				$value['addr_display'] = $valueLink[0];
				$value['addr1'] = $valueLink[0];
				$value['city'] = $valueLink[1];
				$value['hits'] = 0;
				// uniquement le lien
			} else {
				$value['addr_display'] = $valueLink[0];
				$value['addr1'] = $valueLink[0];
				$value['city'] = '';
				
			}
			
			
		}
	}
	public function formatValuesExport()
	{
		$googlemapSeparator = $this->_fieldParams->get('googlemap_separator', '::');
		$weblinkExport = $this->_fieldParams->get('weblink_export', '1');
		foreach ($this->_fieldValues as $idv => $fieldValue) {
			
			
			$this->_fieldValues[$idv] = $fieldValue['addr_display'] . $googlemapSeparator . $fieldValue['city'] . $googlemapSeparator . $fieldValue['lat']. $googlemapSeparator . $fieldValue['lon']. $googlemapSeparator . $fieldValue['province'];
		
			
		}
	}
}