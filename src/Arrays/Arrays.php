<?php

namespace pointybeard\Helpers\Functions\Arrays;

if (!function_exists(__NAMESPACE__ . '\array_is_assoc')) {
    function array_is_assoc(array $input)
    {
        return array_keys($input) !== range(0, count($input) - 1);
    }
}

if (!function_exists(__NAMESPACE__ . '\array_remove_empty')) {
    function array_remove_empty(array $input, $depth=null)
    {
        if (!is_null($depth) && !is_numeric($depth)) {
            throw new Exceptions\GenericArrayFunctionsException("depth must be NULL or a positive integer value");
        }

        foreach ($input as $key => $value) {
            if (is_array($value) && (is_null($depth) || $depth > 0)) {
                $input[$key] = array_remove_empty(
                    $input[$key],
                    is_null($depth) ? null : $depth--
                );
            }

            if (empty($input[$key])) {
                unset($input[$key]);
            }
        }
        return $input;
    }
}
