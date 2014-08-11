<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::import('Vendor', 'Openpay', array('file' => 'Openpay/Openpay.php'));
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);
	public $components = array(
	                            'DebugKit.Toolbar',
	                            'Session',
	                            'Cookie'
	                           );
	
	public function beforeFilter() {
		parent::beforeFilter();
		if($this->Cookie->check('login') || $this->Session->check('login')){
			$this->loadModel('Usuario');
			$loggedUser = $this->Usuario->find('first', $this->getLogged());
			$this->set(compact('loggedUser'));
			$this->loggedUser = $loggedUser;
		}
		$cantidadesArray = array('50'=>'50gr', '100'=>'100gr', '150'=>'150gr', '200'=>'200gr', '250'=>'250gr','500'=>'500gr','1000'=>'1kg',);
		$this->set(compact('cantidadesArray'));
    }

    public function checkAccess($role = null)
    {
    	if ($this->Cookie->check('login') || $this->Session->check('login')) {
    		if ($role == 'admin') {
	    		$loggedUser = $this->Usuario->find('first', $this->getLogged());
	    		if($loggedUser['Usuario']['tipo'] !== '0'){
		    		$this->Session->setFlash(__('No tienes permiso a este sitio.'), 'alert-box', array('class'=>'alert-danger alert-content'));
					$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
					exit();
	    		}
	    	} elseif ($role == 'negocio') {
	    		$loggedUser = $this->Usuario->find('first', $this->getLogged());
	    		if($loggedUser['Usuario']['tipo'] !== '1'){
		    		$this->Session->setFlash(__('No tienes permiso a este sitio.'), 'alert-box', array('class'=>'alert-danger alert-content'));
					$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
					exit();
	    		}
	    	} elseif ($role == 'particular') {
	    		$loggedUser = $this->Usuario->find('first', $this->getLogged());
	    		if($loggedUser['Usuario']['tipo'] !== '2'){
		    		$this->Session->setFlash(__('No tienes permiso a este sitio.'), 'alert-box', array('class'=>'alert-danger alert-content'));
					$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
					exit();
	    		}
	    	}
    	}else{
    		$this->Session->setFlash(__('No tienes acceso a este sitio. Favor de crear una cuenta'), 'alert-box', array('class'=>'alert-warning alert-content'));
			$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
			exit();
    	}
    }

    public function getLogged()
    {
    	if($this->Session->check('login')){
			$id = $this->Session->read('login');
			$options = array('recursive'=>0, 'conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			return $options;
		}else{
			$id = $this->Cookie->read('login');
			$options = array('recursive'=>0,'conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			return $options;
		}
    }

    public function countryList()
    {
    	$countries = array( "AF"=>"Afghanistan", "AL"=>"Albania", "DZ"=>"Algeria", "AS"=>"American Samoa", "AD"=>"Andorra", "AO"=>"Angola", "AI"=>"Anguilla", "AQ"=>"Antarctica", "AG"=>"Antigua and Barbuda", "AR"=>"Argentina", "AM"=>"Armenia", "AW"=>"Aruba", "AU"=>"Australia", "AT"=>"Austria", "AZ"=>"Azerbaijan", "BS"=>"Bahamas", "BH"=>"Bahrain", "BD"=>"Bangladesh", "BB"=>"Barbados", "BY"=>"Belarus", "BE"=>"Belgium", "BZ"=>"Belize", "BJ"=>"Benin", "BM"=>"Bermuda", "BT"=>"Bhutan", "BO"=>"Bolivia", "BA"=>"Bosnia and Herzegowina", "BW"=>"Botswana", "BV"=>"Bouvet Island", "BR"=>"Brazil", "IO"=>"British Indian Ocean Territory", "BN"=>"Brunei Darussalam", "BG"=>"Bulgaria", "BF"=>"Burkina Faso", "BI"=>"Burundi", "KH"=>"Cambodia", "CM"=>"Cameroon", "CA"=>"Canada", "CV"=>"Cape Verde", "KY"=>"Cayman Islands", "CF"=>"Central African Republic", "TD"=>"Chad", "CL"=>"Chile", "CN"=>"China", "CX"=>"Christmas Island", "CC"=>"Cocos (Keeling) Islands", "CO"=>"Colombia", "KM"=>"Comoros", "CG"=>"Congo", "CD"=>"Congo, the Democratic Republic of the", "CK"=>"Cook Islands", "CR"=>"Costa Rica", "CI"=>"Cote d'Ivoire", "HR"=>"Croatia (Hrvatska)", "CU"=>"Cuba", "CY"=>"Cyprus", "CZ"=>"Czech Republic", "DK"=>"Denmark", "DJ"=>"Djibouti", "DM"=>"Dominica", "DO"=>"Dominican Republic", "TP"=>"East Timor", "EC"=>"Ecuador", "EG"=>"Egypt", "SV"=>"El Salvador", "GQ"=>"Equatorial Guinea", "ER"=>"Eritrea", "EE"=>"Estonia", "ET"=>"Ethiopia", "FK"=>"Falkland Islands (Malvinas)", "FO"=>"Faroe Islands", "FJ"=>"Fiji", "FI"=>"Finland", "FR"=>"France", "FX"=>"France, Metropolitan", "GF"=>"French Guiana", "PF"=>"French Polynesia", "TF"=>"French Southern Territories", "GA"=>"Gabon", "GM"=>"Gambia", "GE"=>"Georgia", "DE"=>"Germany", "GH"=>"Ghana", "GI"=>"Gibraltar", "GR"=>"Greece", "GL"=>"Greenland", "GD"=>"Grenada", "GP"=>"Guadeloupe", "GU"=>"Guam", "GT"=>"Guatemala", "GN"=>"Guinea", "GW"=>"Guinea-Bissau", "GY"=>"Guyana", "HT"=>"Haiti", "HM"=>"Heard and Mc Donald Islands", "VA"=>"Holy See (Vatican City State)", "HN"=>"Honduras", "HK"=>"Hong Kong", "HU"=>"Hungary", "IS"=>"Iceland", "IN"=>"India", "ID"=>"Indonesia", "IR"=>"Iran (Islamic Republic of)", "IQ"=>"Iraq", "IE"=>"Ireland", "IL"=>"Israel", "IT"=>"Italy", "JM"=>"Jamaica", "JP"=>"Japan", "JO"=>"Jordan", "KZ"=>"Kazakhstan", "KE"=>"Kenya", "KI"=>"Kiribati", "KP"=>"Korea, Democratic People's Republic of", "KR"=>"Korea, Republic of", "KW"=>"Kuwait", "KG"=>"Kyrgyzstan", "LA"=>"Lao People's Democratic Republic", "LV"=>"Latvia", "LB"=>"Lebanon", "LS"=>"Lesotho", "LR"=>"Liberia", "LY"=>"Libyan Arab Jamahiriya", "LI"=>"Liechtenstein", "LT"=>"Lithuania", "LU"=>"Luxembourg", "MO"=>"Macau", "MK"=>"Macedonia, The Former Yugoslav Republic of", "MG"=>"Madagascar", "MW"=>"Malawi", "MY"=>"Malaysia", "MV"=>"Maldives", "ML"=>"Mali", "MT"=>"Malta", "MH"=>"Marshall Islands", "MQ"=>"Martinique", "MR"=>"Mauritania", "MU"=>"Mauritius", "YT"=>"Mayotte", "MX"=>"Mexico", "FM"=>"Micronesia, Federated States of", "MD"=>"Moldova, Republic of", "MC"=>"Monaco", "MN"=>"Mongolia", "MS"=>"Montserrat", "MA"=>"Morocco", "MZ"=>"Mozambique", "MM"=>"Myanmar", "NA"=>"Namibia", "NR"=>"Nauru", "NP"=>"Nepal", "NL"=>"Netherlands", "AN"=>"Netherlands Antilles", "NC"=>"New Caledonia", "NZ"=>"New Zealand", "NI"=>"Nicaragua", "NE"=>"Niger", "NG"=>"Nigeria", "NU"=>"Niue", "NF"=>"Norfolk Island", "MP"=>"Northern Mariana Islands", "NO"=>"Norway", "OM"=>"Oman", "PK"=>"Pakistan", "PW"=>"Palau", "PA"=>"Panama", "PG"=>"Papua New Guinea", "PY"=>"Paraguay", "PE"=>"Peru", "PH"=>"Philippines", "PN"=>"Pitcairn", "PL"=>"Poland", "PT"=>"Portugal", "PR"=>"Puerto Rico", "QA"=>"Qatar", "RE"=>"Reunion", "RO"=>"Romania", "RU"=>"Russian Federation", "RW"=>"Rwanda", "KN"=>"Saint Kitts and Nevis",  "LC"=>"Saint LUCIA", "VC"=>"Saint Vincent and the Grenadines", "WS"=>"Samoa", "SM"=>"San Marino", "ST"=>"Sao Tome and Principe",  "SA"=>"Saudi Arabia", "SN"=>"Senegal", "SC"=>"Seychelles", "SL"=>"Sierra Leone", "SG"=>"Singapore", "SK"=>"Slovakia (Slovak Republic)", "SI"=>"Slovenia", "SB"=>"Solomon Islands", "SO"=>"Somalia", "ZA"=>"South Africa", "GS"=>"South Georgia and the South Sandwich Islands", "ES"=>"Spain", "LK"=>"Sri Lanka", "SH"=>"St. Helena", "PM"=>"St. Pierre and Miquelon", "SD"=>"Sudan", "SR"=>"Suriname", "SJ"=>"Svalbard and Jan Mayen Islands", "SZ"=>"Swaziland", "SE"=>"Sweden", "CH"=>"Switzerland", "SY"=>"Syrian Arab Republic", "TW"=>"Taiwan, Province of China", "TJ"=>"Tajikistan", "TZ"=>"Tanzania, United Republic of", "TH"=>"Thailand", "TG"=>"Togo", "TK"=>"Tokelau", "TO"=>"Tonga", "TT"=>"Trinidad and Tobago", "TN"=>"Tunisia", "TR"=>"Turkey", "TM"=>"Turkmenistan", "TC"=>"Turks and Caicos Islands", "TV"=>"Tuvalu", "UG"=>"Uganda", "UA"=>"Ukraine", "AE"=>"United Arab Emirates", "GB"=>"United Kingdom", "US"=>"United States", "UM"=>"United States Minor Outlying Islands", "UY"=>"Uruguay", "UZ"=>"Uzbekistan", "VU"=>"Vanuatu", "VE"=>"Venezuela", "VN"=>"Viet Nam", "VG"=>"Virgin Islands (British)", "VI"=>"Virgin Islands (U.S.)", "WF"=>"Wallis and Futuna Islands", "EH"=>"Western Sahara", "YE"=>"Yemen", "YU"=>"Yugoslavia", "ZM"=>"Zambia", "ZW"=>"Zimbabwe",);
    	return $countries;
    }
}
