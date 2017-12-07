<?php

namespace RifkyEkayama\Twillio\Verify;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RifkyEkayama\RajaOngkir\EndPoints
 */
class VerifyFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Verify';
    }
}
