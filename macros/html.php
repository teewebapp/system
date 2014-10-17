<?php

HTML::macro('updateButton', function($label, $route) {
    $html  = "<a href=\"$route\" title=\"$label\">";
    $html .= "  <button type=\"button\" class=\"btn btn-primary btn-xs\">";
    $html .= "    <span class=\"glyphicon glyphicon-pencil\"></span> $label";
    $html .= "  </button>";
    $html .= "</a>";
    return $html;
});

HTML::macro('deleteButton', function($label, $route) {
    $html  = Form::open(array('url' => $route, 'method' => 'delete', 'style'=>'display:inline;', 'onsubmit'=>"confirm('Tem certeza que deseja remover?')"));
    $html .= "<a href=\"$route\" title=\"$label\">";
    $html .= "  <button type=\"submit\" class=\"btn btn-danger btn-xs\">";
    $html .= "    <span class=\"glyphicon glyphicon-remove\"></span> $label";
    $html .= "  </button>";
    $html .= "</a>";
    $html .= Form::close();
    return $html;
});