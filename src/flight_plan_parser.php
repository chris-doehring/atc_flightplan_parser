<?php
/**
 * @author Chris Doehring (info@chrisdoehring.de)
 * @date 01.05.14
 */

class Flight_Plan_Parser {

	/**
	 * Item #7 AIRCRAFT IDENTIFICATION
	 * @var string
	 */
	protected $_sCallsign = '';

	/**
	 * Item #8 FLIGHT RULES AND TYPE OF FLIGHT (2 characters)
	 * @var string
	 */
	protected $_sFlightRules = '';

	/**
	 * Item #8 FLIGHT RULES AND TYPE OF FLIGHT (2 characters)
	 * @var string
	 */
	protected $_sTypeOfFlight = '';

	/**
	 * Item #9 NUMBER AND TYPE OF AIRCRAFT AND WAKE TURBULENCE CATEGORY
	 * @var int
	 */
	protected $_iNumber = 0;

	/**
	 * Item #9 NUMBER AND TYPE OF AIRCRAFT AND WAKE TURBULENCE CATEGORY
	 * @var string
	 */
	protected $_sTypeOfAircraft = '';

	/**
	 * Item #9 NUMBER AND TYPE OF AIRCRAFT AND WAKE TURBULENCE CATEGORY
	 * @var string
	 */
	protected $_sWakeCat = '';

	/**
	 * Item #10 EQUIPMENT
	 * @var string
	 */
	protected $_sEquipment = '';

	/**
	 * Item #10 EQUIPMENT
	 * @var string
	 */
	protected $_sTransponder = '';

	/**
	 * Item #13 DEPARTURE AERODROME AND TIME
	 * @var string
	 */
	protected $_sDepIcao = '';

	/**
	 * Item #13 DEPARTURE AERODROME AND TIME
	 * @var int
	 */
	protected $_iTime = '';

	/**
	 * Item #15 CRUISING SPEED, ALTITUDE/LEVEL AND ROUTE
	 * @var string
	 */
	protected $_sSpeedType = '';

	/**
	 * Item #15 CRUISING SPEED, ALTITUDE/LEVEL AND ROUTE
	 * @var int
	 */
	protected $_iSpeed = 0;

	/**
	 * Item #15 CRUISING SPEED, ALTITUDE/LEVEL AND ROUTE
	 * @var string
	 */
	protected $_sLevelType = '';

	/**
	 * Item #15 CRUISING SPEED, ALTITUDE/LEVEL AND ROUTE
	 * @var int
	 */
	protected $_iLevel = 0;

	/**
	 * Item #15 CRUISING SPEED, ALTITUDE/LEVEL AND ROUTE
	 * @var string
	 */
	protected $_sRoute = '';

	/**
	 * Item #16 DESTINATION AERODROME, TOTAL ESTIMATED ELAPSED TIME AND ALTERNATE AERODROME(S)
	 * @var string
	 */
	protected $_sDestIcao = '';

	/**
	 * Item #16 DESTINATION AERODROME, TOTAL ESTIMATED ELAPSED TIME AND ALTERNATE AERODROME(S)
	 * @var int
	 */
	protected $_iTtlEeet = 0;

	/**
	 * Item #16 DESTINATION AERODROME, TOTAL ESTIMATED ELAPSED TIME AND ALTERNATE AERODROME(S)
	 * @var int
	 */
	protected $_sAltnIcao = '';

	/**
	 * Item #16 DESTINATION AERODROME, TOTAL ESTIMATED ELAPSED TIME AND ALTERNATE AERODROME(S)
	 * @var int
	 */
	protected $_sSecndAltnIcao = '';

	/**
	 * Item #18 OTHER INFORMATION
	 * @var string
	 */
	protected $_sOtherInfo = '';

	/**
	 * Item #19 SUPPLEMENTARY INFORMATION
	 * @var array
	 */
	protected $_aSuplInfo = array();

	/**
	 * @param int $iLevel
	 */
	public function setLevel( $iLevel ) {
		$this->_iLevel = $iLevel;
	}

	/**
	 * @return int
	 */
	public function getLevel() {
		return $this->_iLevel;
	}

	/**
	 * @param int $iNumber
	 */
	public function setNumber( $iNumber ) {
		$this->_iNumber = $iNumber;
	}

	/**
	 * @return int
	 */
	public function getNumber() {
		return $this->_iNumber;
	}

	/**
	 * @param int $iSpeed
	 */
	public function setSpeed( $iSpeed ) {
		$this->_iSpeed = $iSpeed;
	}

	/**
	 * @return int
	 */
	public function getSpeed() {
		return $this->_iSpeed;
	}

	/**
	 * @param int $iTtlEeet
	 */
	public function setTtlEeet( $iTtlEeet ) {
		$this->_iTtlEeet = $iTtlEeet;
	}

	/**
	 * @return int
	 */
	public function getTtlEeet() {
		return $this->_iTtlEeet;
	}

	/**
	 * @param string $sAltnIcao
	 */
	public function setAltnIcao( $sAltnIcao ) {
		$this->_sAltnIcao = $sAltnIcao;
	}

	/**
	 * @return string
	 */
	public function getAltnIcao() {
		return $this->_sAltnIcao;
	}

	/**
	 * @param string $sCallsign
	 */
	public function setCallsign( $sCallsign ) {
		$this->_sCallsign = $sCallsign;
	}

	/**
	 * @return string
	 */
	public function getCallsign() {
		return $this->_sCallsign;
	}

	/**
	 * @param string $sDepIcao
	 */
	public function setDepIcao( $sDepIcao ) {
		$this->_sDepIcao = $sDepIcao;
	}

	/**
	 * @return string
	 */
	public function getDepIcao() {
		return $this->_sDepIcao;
	}

	/**
	 * @param string $sDestIcao
	 */
	public function setDestIcao( $sDestIcao ) {
		$this->_sDestIcao = $sDestIcao;
	}

	/**
	 * @return string
	 */
	public function getDestIcao() {
		return $this->_sDestIcao;
	}

	/**
	 * @param string $sEquipment
	 */
	public function setEquipment( $sEquipment ) {
		$this->_sEquipment = $sEquipment;
	}

	/**
	 * @return string
	 */
	public function getEquipment() {
		return $this->_sEquipment;
	}

	/**
	 * @param string $sFlightRules
	 */
	public function setFlightRules( $sFlightRules ) {
		$this->_sFlightRules = $sFlightRules;
	}

	/**
	 * @return string
	 */
	public function getFlightRules() {
		return $this->_sFlightRules;
	}

	/**
	 * @param string $sLevelType
	 */
	public function setLevelType( $sLevelType ) {
		$this->_sLevelType = $sLevelType;
	}

	/**
	 * @return string
	 */
	public function getLevelType() {
		return $this->_sLevelType;
	}

	/**
	 * @param string $sRoute
	 */
	public function setRoute( $sRoute ) {
		$this->_sRoute = $sRoute;
	}

	/**
	 * @return string
	 */
	public function getRoute() {
		return $this->_sRoute;
	}

	/**
	 * @param string $sSecndAltnIcao
	 */
	public function setSecndAltnIcao( $sSecndAltnIcao ) {
		$this->_sSecndAltnIcao = $sSecndAltnIcao;
	}

	/**
	 * @return string
	 */
	public function getSecndAltnIcao() {
		return $this->_sSecndAltnIcao;
	}

	/**
	 * @param string $sSpeedType
	 */
	public function setSpeedType( $sSpeedType ) {
		$this->_sSpeedType = $sSpeedType;
	}

	/**
	 * @return string
	 */
	public function getSpeedType() {
		return $this->_sSpeedType;
	}

	/**
	 * @param int $iTime
	 */
	public function setTime( $iTime ) {
		$this->_iTime = $iTime;
	}

	/**
	 * @return int
	 */
	public function getTime() {
		return $this->_iTime;
	}

	/**
	 * @param string $sTransponder
	 */
	public function setTransponder( $sTransponder ) {
		$this->_sTransponder = $sTransponder;
	}

	/**
	 * @return string
	 */
	public function getTransponder() {
		return $this->_sTransponder;
	}

	/**
	 * @param string $sTypeOfAircraft
	 */
	public function setTypeOfAircraft( $sTypeOfAircraft ) {
		$this->_sTypeOfAircraft = $sTypeOfAircraft;
	}

	/**
	 * @return string
	 */
	public function getTypeOfAircraft() {
		return $this->_sTypeOfAircraft;
	}

	/**
	 * @param string $sTypeOfFlight
	 */
	public function setTypeOfFlight( $sTypeOfFlight ) {
		$this->_sTypeOfFlight = $sTypeOfFlight;
	}

	/**
	 * @return string
	 */
	public function getTypeOfFlight() {
		return $this->_sTypeOfFlight;
	}

	/**
	 * @param string $sWakeCat
	 */
	public function setWakeCat( $sWakeCat ) {
		$this->_sWakeCat = $sWakeCat;
	}

	/**
	 * @return string
	 */
	public function getWakeCat() {
		return $this->_sWakeCat;
	}

	/**
	 * @param array $aSuplInfo
	 */
	public function setSuplInfo( $aSuplInfo ) {
		$this->_aSuplInfo = $aSuplInfo;
	}

	/**
	 * @return array
	 */
	public function getSuplInfo() {
		return $this->_aSuplInfo;
	}

	/**
	 * @param string $sOtherInfo
	 */
	public function setOtherInfo( $sOtherInfo ) {
		$this->_sOtherInfo = $sOtherInfo;
	}

	/**
	 * @return string
	 */
	public function getOtherInfo() {
		return $this->_sOtherInfo;
	}

}