<?php
/**
 * Weighted Random library
 * by Denis Volkov (den@denvo.name)
 *
 * Main function
 *
 * See LICENSE for the copyright information
 */

/**
 * Generate a random number accorging the probability list
 *
 * @param array probList
 *       A list of probabilities, each is a number greater than zero
 *
 * @return random number from 0 to N-1
 *       where N is a number of elements in the probability list
 */

function wRand($probList)
{
    $accProbList = array();
    $probSum = 0;

    // Generate the list of accumulated probabilities
    foreach ($probList as $prob) {
        $probSum += $prob;
        $accProbList[] = $probSum;
    }

    $rand = mt_rand(0, $probSum - 1);

    // Find a position in that list where the random value
    // is less than the accumulated probability for the position
    foreach ($accProbList as $index => $accProb)
    {
        if ($rand < $accProb)
        {
            return $index;
        }
    }
}
