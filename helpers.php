<?php

function attributeName($model, $attributeName) {
    if(is_string($model))
    {
        $cls = $model;
    }
    else
    {
        $cls = get_class($model);
    }
    $names = $cls::getAttributeNames();
    $name = array_key_exists($attributeName, $names) ? $names[$attributeName] : '';
    if(!$name)
    {
        $name = str_replace('_', ' ', $attributeName);
        $name = ucwords($name);
    }
    return $name;
}

function moduleEnabled($moduleName) {
    $app = app();
    $module = $app['modules']->module($moduleName);
    if($module && $module->enabled())
        return true;
    else
        return false;
}

function moduleAsset($moduleName, $asset) {
    return URL::asset("packages/module/{$moduleName}/assets/{$asset}");
}

function formatCurrency($number) {
    return 'R$ '.number_format($number, 2, ',', '');
}

function currentSite() {
    return SiteIdentifier::current();
}