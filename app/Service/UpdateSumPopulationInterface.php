<?php
/**
 * User: Serhii T.
 * Date: 7/3/18
 */

namespace App\Service;

interface UpdateSumPopulationInterface
{
    /**
     * @param int $sum
     * @return mixed
     */
    public function update(int $sum);
}
