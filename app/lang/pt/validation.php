<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => "O campo :attribute deve ser aceito.",
    "active_url"       => "O campo :attribute n&atilde;o cont&eacute;m um URL v&aacute;lido.",
    "after"            => "O campo :attribute dever&aacute; conter uma data posterior a :date.",
    "alpha"            => "O campo :attribute dever&aacute; conter apenas letras.",
    "alpha_dash"       => "O campo :attribute dever&aacute; conter apenas letras, n&uacute;meros e tra&ccedil;os.",
    "alpha_num"        => "O campo :attribute dever&aacute; conter apenas letras e n&uacute;meros .",
    "array"            => "O campo :attribute precisa ser um conjunto.",
    "before"           => "O campo :attribute dever&aacute; conter uma data anterior a :date.",
    "between"          => array(
        "numeric" => "O campo :attribute dever&aacute; ter um valor entre :min - :max.",
        "file"    => "O campo :attribute dever&aacute; ter um tamanho entre :min - :max kilobytes.",
        "string"  => "O campo :attribute dever&aacute; conter entre :min - :max caracteres.",
        "array"   => "O campo :attribute precisar ter entre :min - :max itens."
    ),
    "confirmed"        => "A confirma&ccedil;&atilde;o para o campo :attribute n&atilde;o coincide.",
    "date"             => "O campo :attribute n&atilde;o cont&eacute;m uma data v&aacute;lida.",
    "date_format"      => "A data indicada para o campo :attribute n&atilde;o respeita o formato :format.",
    "different"        => "Os campos :attribute e :other dever&atilde;o conter valores diferentes.",
    "digits"           => "O campo :attribute dever&aacute; conter :digits d&iacute;gitos.",
    "digits_between"   => "O campo :attribute dever&aacute; conter entre :min a :max d&iacute;gitos.",
    "email"            => "O campo :attribute n&atilde;o cont&eacute;m um endere&ccedil;o de email v&aacute;lido.",
    "exists"           => "O valor selecionado para o campo :attribute &eacute; inv&aacute;lido.",
    "image"            => "O campo :attribute dever&aacute; conter uma imagem.",
    "in"               => "O campo :attribute n&atilde;o cont&eacute;m um valor v&aacute;lido.",
    "integer"          => "O campo :attribute dever&aacute; conter um n&uacute;mero inteiro.",
    "ip"               => "O campo :attribute dever&aacute; conter um IP v&aacute;lido.",
    "max"              => array(
        "numeric" => "O campo :attribute n&atilde;o dever&aacute; conter um valor superior a :max.",
        "file"    => "O campo :attribute n&atilde;o dever&aacute; ter um tamanho superior a :max kilobytes.",
        "string"  => "O campo :attribute n&atilde;o dever&aacute; conter mais de :max caracteres.",
        "array"   => "O campo :attribute deve ter no m&aacute;ximo :max itens."
    ),
    "mimes"            => "O campo :attribute dever&aacute; conter um arquivo do tipo: :values.",
    "min"              => array(
        "numeric" => "O campo :attribute dever&aacute; ter um valor superior ou igual a :min.",
        "file"    => "O campo :attribute dever&aacute; ter no m&iacute;nimo :min kilobytes.",
        "string"  => "O campo :attribute dever&aacute; conter no m&iacute;nimo :min caracteres.",
        "array"   => "O campo :attribute deve ter no m&iacute;nimo :min itens."
    ),
    "not_in"               => "O campo :attribute cont&eacute;m um valor inv&aacute;lido.",
    "numeric"              => "O campo :attribute dever&aacute; conter um valor num&eacute;rico.",
    "regex"                => "O formato do valor para o campo :attribute &eacute; inv&aacute;lido.",
    "required"             => "&Eacute; obrigat&oacute;ria a indica&ccedil;&atilde;o de um valor para o campo :attribute.",
    "required_if"          => "&Eacute; obrigat&oacute;ria a indica&ccedil;&atilde;o de um valor para o campo :attribute quando o valor do campo :other &eacute; igual a :value.",
    "required_with"        => "&Eacute; obrigat&oacute;ria a indica&ccedil;&atilde;o de um valor para o campo :attribute quando :values est&aacute; presente.",
    "required_with_all"    => "&Eacute; obrigat&oacute;ria a indica&ccedil;&atilde;o de um valor para o campo :attribute quando um dos :values est&aacute; presente.",
    "required_without"     => "&Eacute; obrigat&oacute;ria a indica&ccedil;&atilde;o de um valor para o campo :attribute quanto :values n&atilde;o est&aacute; presente.",
    "required_without_all" => "&Eacute; obrigat&oacute;ria a indica&ccedil;&atilde;o de um valor para o campo :attribute quando nenhum dos :values est&aacute; presente.",
    "same"             => "Os campos :attribute e :other dever&atilde;o conter valores iguais.",
    "size"             => array(
        "numeric" => "O campo :attribute dever&aacute; conter o valor :size.",
        "file"    => "O campo :attribute dever&aacute; ter o tamanho de :size kilobytes.",
        "string"  => "O campo :attribute dever&aacute; conter :size caracteres.",
        "array"   => "O campo :attribute deve ter :size itens."
    ),
    "unique"           => "O valor indicado para o campo :attribute j&aacute; se encontra registrado.",
    "url"              => "O formato do URL indicado para o campo :attribute &eacute; inv&aacute;lido.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(
        'attribute-name' => array(
            'rule-name' => 'custom-message',
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(
        'title' => 'Título',
        'content' => 'Conteúdo',
        'image' => 'Imagem',
        'type' => 'Tipo',
    ),

);
