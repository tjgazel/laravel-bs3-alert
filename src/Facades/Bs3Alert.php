<?php 

namespace TJGazel\Bs3Alert\Facades;

use Illuminate\Support\Facades\Facade;
use TJGazel\Bs3Alert\Bs3Alert as Alert;

class Bs3Alert extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Alert::class;
    }
}
