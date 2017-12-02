<?php

namespace UHack\Pronto\Facades;

use Illuminate\Support\Facades\Facade;

class UnionBankAPIFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'union-bank';
    }
}