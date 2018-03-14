<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TrackMeetTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function meet_has_a_name()
    {
        $meet = factory('App\Models\Meets\Track\Meet')->create();

        $this->assertInstanceOf('App\Models\Meets\Track\Name', $meet->meetName);
    }
}
