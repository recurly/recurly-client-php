<?php

namespace Recurly;

trait RecurlyTraits
{

    /**
     * Capitalizes all the words in the $input.
     *
     * @param string $input  The string to titleize
     * @param string $prefix (optional) Prefix to add to the beginning of the
     *                       titleized string. The prefix will not be titleized.
     * 
     * @return string The titleized $input wtih the prepended $prefix
     */
    protected static function titleize(string $input, string $prefix = ''): string
    {
        return array_reduce(
            explode('_', $input),
            function ($name, $part) {
                return $name.ucfirst($part);
            },
            $prefix
        );
    }

}