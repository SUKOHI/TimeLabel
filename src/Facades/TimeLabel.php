<?php namespace Sukohi\TimeLabel\Facades;

use Illuminate\Support\Facades\Facade;

class TimeLabel extends Facade {

    protected static function getFacadeAccessor() {

        return 'time-label';

    }

}