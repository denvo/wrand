<?php
/**
 * Weighted Random library
 * by Denis Volkov (den@denvo.name)
 *
 * Test suite
 *
 * See LICENSE for the copyright information
 */

require('./wrand.php');

function runTest($probList)
{
    $startTime = microtime(true);
    $freq = array_fill(0, count($probList), 0);
    while ($freq[0] < $probList[0] * 1000)
    {
        $freq[wRand($probList)] ++;
    }
    $stopTime = microtime(true);
    print "List of probabilities:\n";
    print_r($probList);
    print "Random numbers distribution:\n";
    print_r($freq);
    printf("Execution time: %fs\n", $stopTime - $startTime);
}

runTest(array(3, 8, 1, 5, 2, 2));
runTest(array(5, 1));
runTest(array(2, 2, 2));
runTest(array(100));
