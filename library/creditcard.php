<?php
/*-------------------------------------------------------------------------

	Class: CreditCard
	Description:
		This class represents a single credit card.
	Author: Jordan Harband (ljharb@gmail.com)
	Created: 2007-02-08
	Edit History:
		2007-02-08 - Created
		2010-01-12 - Modified for MobBase
		2010-03-21 - Modified for Recurly

-------------------------------------------------------------------------*/

	if (!defined('CC_VISA')) { define('CC_VISA', 'Visa'); }
	if (!defined('CC_MC')) { define('CC_MC', 'MasterCard'); }
	if (!defined('CC_AMEX')) { define('CC_AMEX', 'Amex'); }
	if (!defined('CC_DS')) { define('CC_DS', 'Discover'); }
	if (!defined('CC_BOGUS')) { define('CC_BOGUS', 'Bogus'); }
	if (!defined('CC_MAXLEN')) { define('CC_MAXLEN', 19); }

	class CreditCard extends Object {

	/** Constructor for the CreditCard object.
			@param $type (string): [CC_VISA, CC_MC, CC_AMEX, CC_DS, CC_BOGUS]
			@param $number (string): Maximum 19-digit string of numbers.
			@param $cvv (string): 3 or 4 digit CVV2/CID code.
			@param $month (int): 2-digit expiration month.
			@param $year (int): 4-digit expiration year. 2-digit year will assume 21st century.
			@param $last4 (boolean): Default false. If true, $number is just last 4 digits and $cvv is null.
			@return CreditCard object if valid, or false if failed.
*/
		public function __construct
			( /* string */ $type, /* string */ $number, /* string */ $cvv,
				/* int */ $month, /* int */ $year, /* boolean */ $last4 = false ) {
			if (!$last4) {
				$isValid = $this->setType( $type )
					&& $this->setNumber( $number )
					&& $this->setCVV( $cvv )
					&& $this->setExp( $month, $year );
			} else if (self::isType($type)) {
				$this->setType($type);
				$type = $this->getType();
				$length = array_key_exists($type, self::$numlens) ? self::$numlens[$type] : 19;
				$this->number = str_repeat('*', ($length > 4 ? $length - 4 : 4)).$number;
				$this->setExp( $month, $year );
				$isValid = true;
			}
			return $isValid ? $this : $this->__destruct();
		}

	/** Returns the type of the credit card. [CC_VISA, CC_MC, CC_AMEX, CC_DS]
			@return String: Type of credit card.
*/
		public function getType () 	{ return $this->type; }

	/** Returns the credit card number.
			@return String: Credit card number.
*/
		public function getNumber () 	{ return $this->number; }

	/** Returns the last 4 digits of the credit card number.
			@param $just4 (boolean): Default false. If true, will return full starred-out string.
			@return String: Either full string with just last 4 showing, or, just last 4.
*/
		public function getLastFour ($just4 = false) {
			$num = $this->getNumber();
			if (!$just4) { $stars = str_repeat('*', self::$numlens[ $this->getType() ] - 4); }
			return $stars.substr($num, -4, 4);
		}

	/** Returns the CVV2/CID of the credit card.
			@return String: CVV2/CID code. 3 or 4 digits.
*/
		public function getCVV () 	{ return $this->CVV; }
	/** Returns the expiration date of the credit card.
			@return Array: ['month'=> Month, 'year'=> Year]
*/
		public function getExp () 	{ return $this->exp; }

	/** Sets the type of the credit card. [CC_VISA, CC_MC, CC_AMEX, CC_DS]
			@return Boolean: True if successful, false if failed.
*/
		public function setType ( $type ) {
			if ( in_array( $type, self::$types ) ) {
				$this->type = $type;
				$retval = true;
			} else { $retval = false; }
			return $retval;
		}

	/** Sets the credit card number.
			Precondition: CC Type is set.
			@param $cc (string): Maximum 19-digit string of numbers.
			@return Boolean: true if valid, false if invalid.
*/
		public function setNumber (/* string */ $cc ) {
			$num = ereg_replace( '[^0-9]', '', $cc );
			if ( strlen($num) < CC_MAXLEN && isset($this->type) && $this->checkLuhn( $num ) ) {
				$this->number = $num;
				$retval = true;
			} else { $retval = false; }
			return $retval;
		}

	/** Sets the CVV2/CID code.
			Precondition: CC Type is set.
			@param $cvv (string): 3 or 4 digit code.
			@return Boolean: true if successful, false if failed.
*/
		public function setCVV ( $cvv ) {
			if ( isset($this->type) && is_numeric($cvv) && self::$cvvlens[$this->getType()] == strlen($cvv) ) {
			 	$this->CVV = $cvv;
				$retval = true;
			} else { $retval = false; }
			return $retval;
		}

	/** Sets Expiration Date, assuming valid month and year, and month and year are later than the current month.
			@param $mm (int): 2-digit month.
			@param $yyyy (int): 4-digit year. 2-digit year will assume 21st century.
			@return Boolean: true if successful, otherwise false.
*/
		public function setExp ( $mm, $yyyy ) {
			$dateArray = self::checkExp($mm, $yyyy);
			$retval = is_array($dateArray);
			if ($retval) { $this->exp = $dateArray; }

			return $retval;
		}

	/** Checks Expiration Date, assuming valid month and year, and month and year are later than the current month.
			@param $mm (int): 2-digit month.
			@param $yyyy (int): 4-digit year. 2-digit year will assume 21st century.
			@return Boolean: array of year and month if successful, otherwise false.
*/
		public static function checkExp( /* int */ $mm, /* int */ $yyyy ) {
			$curMo = date('m');
			$curYr = date('Y');

			// month is numeric, and in (0, 12]
			$month = is_numeric($mm) && intval($mm) > 0 && intval($mm) <= 12;

			// year is numeric, and in [current, current + 10]
			if (strlen(intval($yyyy))==2) { $yyyy = '20'.$yyyy; }	// Yay, no more Y2K!
			$year = is_numeric($yyyy) && intval($yyyy) >= $curYr && intval($yyyy) <= $curYr + 10;
			if ($year && $yyyy == $curYr && $mm < $curMo) { $year = false; } // date is after or in current month.

			return $year && $month ? array('year'=> $yyyy, 'month'=> $mm) : false;
		}

		// This function strips the nondigits, then checks using the Luhn (aka mod10) algorithm. Also checks length against type-specific length.
		private function checkLuhn ( $cc ) {
			$num = ereg_replace( '[^0-9]', '', $cc );
			if ( strlen($num) == self::$numlens[ $this->getType() ] ) {
				$parity = strlen($num) % 2;
				$sum = 0;
				for ($i = 0; $i < strlen($num); ++$i) {
					$digit = $num[$i];
					$digit = $i % 2 == $parity ? $digit * 2 : $digit;
					$digit = $digit > 9 ? $digit - 9 : $digit;
					$sum += $digit;
				}
				$valid = ($sum % 10 == 0);
			} else { $valid = false; }
			return $valid;
		}

	/** Destructor. Invalidates the object.
*/
		public function __destruct () {
			$this->valid = false;
			unset($this->type, $this->number, $this->CVV, $this->exp, $this);
		}

		private $type;		// Credit Card Type

		public static function isType( $type ) { return in_array($type, self::$types); }
		public static function CVVWord( $type ) { return in_array($type, self::$types) ? self::$cvvword[$type] : false; }

		private static $types =   array( CC_VISA, CC_MC, CC_AMEX, CC_DS, CC_BOGUS );
		private static $cvvlens = array( CC_VISA => 3, CC_MC => 3, CC_AMEX => 4, CC_DS => 3, CC_BOGUS => 3 );
		private static $cvvword = array( CC_VISA => 'CVV2', CC_MC => 'CVV2', CC_AMEX => 'CID', CC_DS => 'CID', CC_BOGUS => 'CVV' );
		private static $numlens = array( CC_VISA => 16, CC_MC => 16, CC_AMEX => 17, CC_DS => 16, CC_BOGUS => 1 );

		private $number;	// Credit Card number, max 19 digits
		private $CVV;		// 3/4 digit verification code
		private $exp;		// Expiration Date - Array('month'=>int[1..12], 'year'=>int[curyear..curyear+10])
	}
