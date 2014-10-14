<?php

/**
 * Make a label with model attribute name
 */
Form::macro('labelModel', function($model, $attributeName) {
    return Form::label($attributeName, attributeName($model, $attributeName));
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

/**
 * Creates a Html Editor
 */
Form::macro('editor', function($attributeName, $value=null, $options=array()) {
    Asset::add(Theme::asset('assets/js/plugins/ckeditor/ckeditor.js'));
    Asset::addScript("
        CKEDITOR.config.allowedContent = true;
        var editor = CKEDITOR.replace('text', {
            filebrowserBrowseUrl : '".URL::to('/ckfinder/ckfinder.html')."',
            filebrowserImageBrowseUrl : '".URL::to('/ckfinder/ckfinder.html?type=Images')."',
            filebrowserFlashBrowseUrl : '".URL::to('/ckfinder/ckfinder.html?type=Flash')."',
            filebrowserUploadUrl : '".URL::to('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')."',
            filebrowserImageUploadUrl : '".URL::to('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')."',
            filebrowserFlashUploadUrl : '".URL::to('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')."'
        });
        CKFinder.setupCKEditor( editor, '../' );
    ", 'ready');
    return Form::textArea($attributeName, $value, $options);
});