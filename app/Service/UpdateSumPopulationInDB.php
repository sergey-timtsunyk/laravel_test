<?php
/**
 * User: Serhii T.
 * Date: 7/3/18
 */

namespace App\Service;

use App\Sum;

class UpdateSumPopulationInDB implements UpdateSumPopulationInterface
{
    public function update(int $sumPopulation)
    {
        /** @var Sum $sum */
        $sum = Sum::query()->findOrFail(1);

        $sum->setSum($sumPopulation);
        $sum->save();
    }
}
