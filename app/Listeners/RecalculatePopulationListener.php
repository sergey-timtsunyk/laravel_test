<?php

namespace App\Listeners;

use App\District;
use App\Events\UpdatePopulationInDistrictEvent;
use App\Service\UpdateSumPopulationInterface;
use App\Sum;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecalculatePopulationListener
{
    /**
     * @var UpdateSumPopulationInterface
     */
    private $updateSumPopulation;

    /**
     * Create the event listener.
     *
     * @param UpdateSumPopulationInterface $updateSumPopulation
     *
     * @return void
     */
    public function __construct(UpdateSumPopulationInterface $updateSumPopulation)
    {
        $this->updateSumPopulation = $updateSumPopulation;
    }

    /**
     * Handle the event.
     *
     * @param  UpdatePopulationInDistrictEvent  $event
     * @return void
     */
    public function handle(UpdatePopulationInDistrictEvent $event)
    {
        $this->updateSumPopulation->update(District::query()->sum('population'));
    }
}
