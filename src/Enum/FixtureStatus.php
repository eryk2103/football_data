<?php

namespace App\Enum;

enum FixtureStatus : string
{
    case SCHEDULED = 'SCHEDULED';
    case DELAYED = 'DELAYED';
    case POSTPONED = 'POSTPONED';
    case IN_PLAY = 'IN_PLAY';
    case HALF_TIME = 'HALF_TIME';
    case FULL_TIME = 'FULL_TIME';
    case EXTRA_TIME = 'EXTRA_TIME';
    case PENALTIES = 'PENALTIES';
}
