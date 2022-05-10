<?php
/**
 * @version     0.0.1
 * @package     Fabrika Development Team
 * @subpackage  Composers to Fabrika Development Team
 * @author      davidsnege <david.snege@gmail.com>
 * @copyright   2020 davidsnege (FabrikaDev)
 * @license     Licença de uso Somente para uso no ensino de Programação 
 * (Outros usos estão vetados)
 */

/**
 * [Description FabrikaLanguage]
 * @param  [type] $langBrowser [description]
 * @return [type]               [description]
 * @throws [type]               [description]
 */
class FabrikaLanguage{
	/**
	 * @param array $available
	 * @param string $default
	 * 
	 * @return [type]
	 */
	public static function get_language( $available = [], $default = 'pt_br' ){
		if ( isset( $_SERVER[ 'HTTP_ACCEPT_LANGUAGE' ] ) ) {
			$langs = explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] );
			if ( empty( $available ) ) {
				$langs[0] = substr($langs[0], 0, 2);
				$langss = mb_strtoupper($langs[0]);
				return $langss;
			}
			foreach ( $langs as $lang ){
				$lang = substr( $lang, 0, 2 );
				if( in_array( $lang, $available ) ) {

					$langs = substr($lang, 0, 2);
					$langss = mb_strtoupper($langs);
					return $langss;
				}
			}
		}
		$default = substr($default, 0, 2);
		$default = mb_strtoupper($default);
		return $default;
	}
}

$langBrowser = FabrikaLanguage::get_language();
