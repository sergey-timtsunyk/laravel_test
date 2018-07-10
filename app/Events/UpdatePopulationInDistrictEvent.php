<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdatePopulationInDistrictEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $districtId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $districtId)
    {
        $this->districtId = $districtId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * @return int
     */
    public function getDistrictId(): int
    {
        return $this->districtId;
    }
}
