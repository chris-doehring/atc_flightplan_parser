<?php
/**
 * @author Chris Doehring (info@chrisdoehring.de)
 * @date 2014-05-01
 */
header("Content-Type: text/plain");

require_once( __DIR__ . '/../src/flight_plan_parser.php' );

$sSource = '
(FPL-GEC8145-IN
-B77L/H-SDE2E3FGHIJ3J4J5M1RWXYZ/SB1D1
-OTBD1040
-N0486F360 R659 EMISA UB457 BAH UM444 DAVUS UL602 ITBIT UM860
 KUGOS/K0885F360 M860 DIGAM/K0880F380 M860 ROLKA/N0474F380 M860
 EGLON L621 LUSID DCT LAVKO M725 SOXUS
-ENBR0631 ENGM
-PBN/A1B1C1D1L1O1S1S2 NAV/RNVD1E2A1 DAT/SVM DOF/140501 REG/DALFA
 EET/OKAC0037 ORBB0052 LTAA0159 UKFV0308 UKOV0333 LUUU0344 UKLV0406
 EPWW0427 ESAA0521 EKDK0540 ENOR0557 SEL/DFBH OPR/GEC RVR/200)
-E/0740 P/3 R/E S/ J/ A/WHITE BLUE TAIL
 ';

$oFplanParser = new Flight_Plan_Parser();
$oFplanParser->setSource( $sSource );
$oFplanParser->startParsing();

echo 'Parsed flight plan:' . PHP_EOL;
echo '==========================' . PHP_EOL;
echo $oFplanParser->exportAtcFlightplan() . PHP_EOL . PHP_EOL;

echo 'Route without step climbs:' . PHP_EOL;
echo '==========================' . PHP_EOL;
echo $oFplanParser->getRoute( true ) . PHP_EOL . PHP_EOL;

echo 'Step climbs:' . PHP_EOL;
echo '==========================' . PHP_EOL;
$aStepClimbs = $oFplanParser->getStepClimbsFromRoute();
if( count( $aStepClimbs ) == 0 ) {
    echo 'No step climbs found.' . PHP_EOL;
} else {
    foreach( $aStepClimbs as $sWaypoint => $sStepclimb ) {
        echo $sWaypoint . ' => ' . $sStepclimb . PHP_EOL;
    }
}

echo PHP_EOL . 'Other information:' . PHP_EOL;
echo '==========================' . PHP_EOL;
$aOtherInfo = $oFplanParser->getOtherInfo( true );
if( count( $aOtherInfo ) == 0 ) {
    echo 'No other info found.' . PHP_EOL;
} else {
    foreach( $aOtherInfo as $sKey => $sValue ) {
        echo $sKey . ' => ' . $sValue . PHP_EOL;
    }
}

echo PHP_EOL . 'Supplementary information:' . PHP_EOL;
echo '==========================' . PHP_EOL;
$aSuplInfo = $oFplanParser->getSuplInfo( true );
if( count( $aSuplInfo ) == 0 ) {
    echo 'No info found.' . PHP_EOL;
} else {
    foreach( $aSuplInfo as $sKey => $sValue ) {
        echo $sKey . ' => ' . $sValue . PHP_EOL;
    }
}