<?php

use Tee\System\Asset;
use Tee\System\Theme;

/**
 * Make a label with model attribute name
 */
Form::macro('labelModel', function($model, $attributeName) {
    $required = $model->isRequiredAttribute($attributeName);
    return sprintf(Form::label($attributeName, '%s'), attributeName($model, $attributeName) . ($required ? ' <span style="color:red">*</span>' : ''));
});

/**
 * Open a form flexible to update and insert operation of determinate
 * resource
 */
Form::macro('resource', function($model, $routePrefix, $options=array()) {
    return Form::model($model, [
        'route' => $model->exists ?
            ["$routePrefix.update", $model->id] :
            ["$routePrefix.store"],
        'method' => $model->exists ? 'PUT' : 'POST',
        'role'=>'form'
    ] + $options);
});

Form::macro('numerical', function($attributeName, $value, $options) {
    foreach(['js/plugins/input-mask/jquery.inputmask.js', 'js/plugins/input-mask/jquery.inputmask.numeric.extensions.js'] as $file) {
        $jsFilename = moduleAsset('admin', $file);
        if(!in_array($jsFilename, @Asset::$js['footer'] ?: array()))
            Asset::add($jsFilename);
    }

    $script = "$('*[data-inputmask]').inputmask();";
    if(!in_array($script, @Asset::$scripts['footer'] ?: array()))
        Asset::addScript($script);

    $options['data-inputmask'] = "'alias': 'integer'";
    return Form::text($attributeName, $value, $options);
});

Form::macro('decimal', function($attributeName, $value, $options) {
    foreach(['js/plugins/input-mask/jquery.inputmask.js', 'js/plugins/input-mask/jquery.inputmask.numeric.extensions.js'] as $file) {
        $jsFilename = moduleAsset('admin', $file);
        if(!in_array($jsFilename, @Asset::$js['footer'] ?: array()))
            Asset::add($jsFilename);
    }
    $options['data-inputmask'] = "'alias': 'decimal', 'radixPoint': ','";

    $script = "$('*[data-inputmask]').inputmask();";
    if(!in_array($script, @Asset::$scripts['footer'] ?: array()))
        Asset::addScript($script);

    $value = str_replace('.', ',', $value);

    return Form::text($attributeName, $value, $options);
});

/**
 * Creates a Html Editor
 */
Form::macro('editor', function($attributeName, $value=null, $options=array()) {
    Asset::add(moduleAsset('system', 'js/ckeditor/ckeditor.js'));
    Asset::addScript("
        CKEDITOR.config.allowedContent = true;
        var editor = CKEDITOR.replace('$attributeName', {
            filebrowserBrowseUrl : '".URL::to(moduleAsset('system', 'ckfinder/ckfinder.html'))."',
            filebrowserImageBrowseUrl : '".URL::to(moduleAsset('system', 'ckfinder/ckfinder.html?type=Images'))."',
            filebrowserFlashBrowseUrl : '".URL::to(moduleAsset('system', 'ckfinder/ckfinder.html?type=Flash'))."',
            filebrowserUploadUrl : '".URL::to(moduleAsset('system', 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'))."',
            filebrowserImageUploadUrl : '".URL::to(moduleAsset('system', 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'))."',
            filebrowserFlashUploadUrl : '".URL::to(moduleAsset('system', 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'))."'
        });
        CKFinder.setupCKEditor( editor, '../' );
    ", 'ready');
    return Form::textArea($attributeName, $value, $options);
});