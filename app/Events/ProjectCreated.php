<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ProjectCreated
{
    use Dispatchable,  SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     *
     *
     *
     */

    public $project;

    public function __construct($project)
    {
        //

        $this->project=$project;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

}
