<?php
/**
 * @author Chris Doehring (info@chrisdoehring.de)
 * @date 2014-05-01
 */

class Flight_Plan_Parser {

	/**
	 * ATC flight plan source
	 * @var string
	 */
	private $_sSource = '';

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
     * @param bool $blRemoveStepClimbs
     * @return string
     */
    public function getRoute( $blRemoveStepClimbs = false ) {
        if( $blRemoveStepClimbs === true ) {
            $sSearchPattern = '/(\D{1,5})([\/]{1})([A-Z0-9]{8,9})/';
            $sReplace = '$1';
            return preg_replace( $sSearchPattern, $sReplace, $this->_sRoute );
        }

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
     * @param bool $blSplitted
     * @return array
     */
    public function getSuplInfo( $blSplitted = false ) {
        if( $blSplitted === true ) {
            $aData = $this->_aSuplInfo;
            if( count( $aData ) > 0 ) {
                $aReturn = array();
                foreach( $aData as $sData ) {
                    $aParts = explode( '/', $sData, 2 );
                    if( array_key_exists( 1, $aParts ) ) {
                        $aReturn[ $aParts[ 0 ] ] = $aParts[ 1 ];
                    } else {
                        $aReturn[ $aParts[ 0 ] ] = '';
                    }
                }

                return $aReturn;
            } else {
                return array();
            }
        }

		return $this->_aSuplInfo;
	}

	/**
	 * @param string $sOtherInfo
	 */
	public function setOtherInfo( $sOtherInfo ) {
		$this->_sOtherInfo = $sOtherInfo;
	}

    /**
     * @param bool $blGetAsArray
     * @return array|string
     */
    public function getOtherInfo( $blGetAsArray = false ) {
        if( $blGetAsArray === true ) {
            $aMatches = array();
            preg_match_all( '/(\D{3})([\/]{1})([A-Z0-9 ]*(?= \D{3}\\/))/', $this->_sOtherInfo, $aMatches );
            if( array_key_exists( 1, $aMatches ) && count( $aMatches[ 1 ] ) > 0 && array_key_exists( 3, $aMatches ) && count( $aMatches[ 3 ] ) > 0 ) {
                return array_combine( $aMatches[ 1 ], $aMatches[ 3 ] );
            } else {
                return array();
            }
        }

		return $this->_sOtherInfo;
	}

	/**
	 * @param string $sSource
	 */
	public function setSource( $sSource ) {
		$this->_sSource = trim( mb_strtoupper( preg_replace( "/\r|\n/", "", $sSource ) ) );
	}

	/**
	 * @return string
	 */
	public function getSource() {
		return $this->_sSource;
	}

	/**
	 * @return bool
	 * @throws Exception
	 */
	public function startParsing() {
		$sSource = $this->getSource();
		if( empty( $sSource ) ) {
			throw new Exception( 'No flight plan source set!' );
		}
		$sBasic = str_replace( array( '(FPL', ')' ), '', $sSource );
		$sBasic = str_replace( '--', '-', $sBasic );

		$this->parseSyntax( $sBasic );

		return true;
	}

	/**
	 * Export data as ATC flight plan
	 * @return string
	 */
	public function exportAtcFlightplan() {
		$sReturn = '(FPL-' . $this->getCallsign() . '-' . $this->getFlightRules() . $this->getTypeOfFlight() . PHP_EOL;
		$sReturn.= '-' . ( ( $this->getNumber() <= 0 || $this->getNumber() > 10 ) ? '' : $this->getNumber() ) . $this->getTypeOfAircraft() . '/' . $this->getWakeCat() . '-' . $this->getEquipment() . '/' . $this->getTransponder() . PHP_EOL;
		$sReturn.= '-' . $this->getDepIcao() . $this->getTime() . PHP_EOL;
		$sReturn.= '-' . $this->getSpeedType() . $this->getSpeed() . $this->getLevelType() . $this->getLevel() . ' ' . $this->getRoute() . PHP_EOL;
		$sReturn.= '-' . $this->getOtherInfo() . ')' . PHP_EOL;
		$sReturn.= ( count( $this->getSuplInfo() ) > 0 ) ? '-' . implode( ' ', $this->getSuplInfo() ) : '';

		return $sReturn;
	}

    /**
     * @param bool $blSplitted
     * @return array
     */
    public function getStepClimbsFromRoute( $blSplitted = true ) {
        $aMatches = array();
        preg_match_all( '/(\D{1,5})([\/]{1})([A-Z0-9]{8,9})/', $this->getRoute(), $aMatches );
        if( array_key_exists( 1, $aMatches ) && count( $aMatches[ 1 ] ) > 0 && array_key_exists( 3, $aMatches ) && count( $aMatches[ 3 ] ) > 0 ) {
            if( $blSplitted === true ) {
                return array_combine( $aMatches[ 1 ], $aMatches[ 3 ] );
            } else {
                return $aMatches[ 0 ];
            }
        }

        return array();
    }

	/**
	 * parse
	 * @param $sBasic
	 */
	private function parseSyntax( $sBasic ) {
		$aBasic = explode( '-', $sBasic );

		//Callsign
		if( array_key_exists( 1, $aBasic ) ) {
			$this->setCallsign( $aBasic[ 1 ] );
		}
		//Flight Rules
		if( array_key_exists( 2, $aBasic ) ) {
			$this->setFlightRules( substr( $aBasic[ 2 ], 0, 1 ) );
			$this->setTypeOfFlight( substr( $aBasic[ 2 ], 1, 1 ) );
		}
		//Aircraft
		if( array_key_exists( 3, $aBasic ) ) {
			$aAicraft = explode( '/', $aBasic[ 3 ] );

			$aMatches = array();
			preg_match( '/(\d{1})(\S{3,4})/', $aAicraft[ 0 ], $aMatches );
			if( count( $aMatches ) > 0 ) {
				$this->setNumber( $aMatches[ 1 ] );
				$this->setTypeOfAircraft( $aMatches[ 2 ] );
			} else {
				$this->setTypeOfAircraft( $aAicraft[ 0 ] );
			}

			if( array_key_exists( 1, $aAicraft ) ) {
				$this->setWakeCat( $aAicraft[ 1 ] );
			}
		}
		//Equipment
		if( array_key_exists( 4, $aBasic ) ) {
			$aEquip = explode( '/', $aBasic[ 4 ] );
			$this->setEquipment( $aEquip[ 0 ] );
			if( array_key_exists( 1, $aEquip ) ) {
				$this->setTransponder( $aEquip[ 1 ] );
			}
		}
		//Dep. airport info
		if( array_key_exists( 5, $aBasic ) ) {
			$aMatches = array();

			preg_match( '/(\D*)(\d*)/', $aBasic[ 5 ], $aMatches );
			if( array_key_exists( 1, $aMatches ) ) {
				$this->setDepIcao( $aMatches[ 1 ] );
			}
			if( array_key_exists( 2, $aMatches ) ) {
				$this->setTime( $aMatches[ 2 ] );
			}
		}
		//Speed and route info
		if( array_key_exists( 6, $aBasic ) ) {
			$aMatches = array();
			//match speed and level
			if( preg_match( '/(\D*)(\d*)(\D*)(\d*)/', $aBasic[ 6 ], $aMatches ) ) {
				if( array_key_exists( 1, $aMatches ) ) {
					$this->setSpeedType( $aMatches[ 1 ] );
				}
				if( array_key_exists( 2, $aMatches ) ) {
					$this->setSpeed( $aMatches[ 2 ] );
				}
				if( array_key_exists( 3, $aMatches ) ) {
					$this->setLevelType( $aMatches[ 3 ] );
				}
				if( array_key_exists( 4, $aMatches ) ) {
					$this->setLevel( $aMatches[ 4 ] );
				}

				$this->setRoute( trim( substr( $aBasic[ 6 ], mb_strlen( $aMatches[ 0 ] ) ) ) );
			} else {
				$this->setRoute( trim( $aBasic[ 6 ] ) );
			}
		}
		//Dest. airport info
		if( array_key_exists( 7, $aBasic ) ) {
			$aMatches = array();

			preg_match( '/(\D{4})(\d{4})/', $aBasic[ 7 ], $aMatches );
			if( array_key_exists( 1, $aMatches ) ) {
				$this->setDestIcao( $aMatches[ 1 ] );
			}
			if( array_key_exists( 2, $aMatches ) ) {
				$this->setTtlEeet( $aMatches[ 2 ] );
			}
			$aMatches = array();

			preg_match( '/(\D{4})(\d{4})(\s{1})(\D{4})/', $aBasic[ 7 ], $aMatches );
			if( array_key_exists( 4, $aMatches ) ) {
				$this->setAltnIcao( $aMatches[ 4 ] );
			}
			$aMatches = array();

			preg_match( '/(\D{4})(\d{4})(\s{1})(\D{4})(\s{1})(\D{4})/', $aBasic[ 7 ], $aMatches );
			if( array_key_exists( 6, $aMatches ) ) {
				$this->setSecndAltnIcao( $aMatches[ 6 ] );
			}
		}
		//Other info
		if( array_key_exists( 8, $aBasic ) ) {
			$this->setOtherInfo( $aBasic[ 8 ] );
		}

		//Supl. Info
		if( array_key_exists( 9, $aBasic ) ) {
			$aMatches = array();

			preg_match_all( '/(\D{1})([\/]{1})([A-Z0-9 ]*(?!\\/))/', $aBasic[ 9 ], $aMatches );
			if( array_key_exists( 0, $aMatches ) && count( $aMatches[ 0 ] ) > 0 ) {
				$aSuplInfo = array();
				foreach( $aMatches[ 0 ] as $sItem ) {
					$aSuplInfo[] = trim( $sItem );
				}
				$this->setSuplInfo( $aSuplInfo );
			}
		}
	}
}