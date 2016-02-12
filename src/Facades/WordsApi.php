<?php

namespace WordsApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for the WordsApi service.
 *
 * @author     Vitor Carreira
 *
 * @link       https://github.com/vcarreira
 */
class WordsApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wordsapi';
    }
}
