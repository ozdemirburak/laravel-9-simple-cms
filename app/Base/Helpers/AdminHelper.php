<?php

if (!function_exists('createTranslation')) {
    /**
     * Creates the base translation
     *
     * @param array $resources
     * @param array $translation
     *
     * @return array
     */
    function createTranslation(array $resources, array $translation)
    {
        foreach ($resources as $resource => $values) {
            if (isset($values['fields'])) {
                $translation['fields'][$resource] = $values['fields'];
                unset($values['fields']);
            }
            $translation['menu'][$resource] = $values;
            $translation[$resource] = $values;
        }
        return $translation;
    }
}

if (!function_exists('getValidationAttributes')) {
    /**
     * Match all attributes with their translations instead of showing their keys
     *
     * @param array $attributes
     * @param array $except
     *
     * @return array
     */
    function getValidationAttributes(array $attributes = [], array $except = [])
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(\Lang::get('admin.fields')));
        foreach ($iterator as $key => $value) {
            if (!in_array($key, $except, true)) {
                $attributes[$key] = $value;
            }
        }
        return $attributes;
    }
}
