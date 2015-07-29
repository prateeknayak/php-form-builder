<?php

namespace Prateek\FormBuilder;

use Prateek\FormBuilder\Builder\Input as I;
use Prateek\FormBuilder\Builder\Form as F;
use Prateek\FormBuilder\Builder\Label as L;
use Prateek\FormBuilder\Builder\Select as S;
use Prateek\FormBuilder\Builder\TextArea as T;
use Prateek\FormBuilder\Builder\Button as B;

class FormBuilder
{
    private function __construct() {}
    private function __clone() {}

    /**
     *  config array is a multidimensional array like:
     *  array("id"          => ""
     *        "name"        => ""
     *        "type"        => ""
     *        "METHOD" => ""
     *        "ACTION"       => ""
     *        "extra"       => ""
     *       );
     * since there can be multiple classes it is a seperate array
     */
    
    public static function start(array $config)
    {
        $form = new F($config);
        $html = $form->startForm();
        $token = $form->generateToken();
        $input = self::input(array("id"=>"__token", "type"=>'hidden','name'=>"__token","value"=>$token));
        $html .= $input;
        return $html;
    }

    public static function close()
    {
        $form = new F(array());
        return $form->closeForm();
    }

    /**
     *  config array is a multidimensional array like:
     *  array("id"          => ""
     *        "name"        => ""
     *        "type"        => ""
     *        "placeholder" => ""
     *        "value"       => ""
     *        "disabled"    => 0/1
     *        "checked"     => 0/1
     *        "extra"       => ""
     *       );
     * since there can be multiple classes it is a seperate array
     */

    public static function input(array $config, array $dataAttributes = array())
    {
        $input = new I($config, $dataAttributes);
        return  $input->build();
    }

    public static function label(array $config, array $dataAttributes = array())
    {
        $label = new L($config, $dataAttributes);
        return $label->build();
    }
    /**
     * array(  "id",
     *         "name",
     *         "value",
     *         "autofocus",
     *         "disabled",
     *         "form",
     *         "multiple",
     *         "required",
     *         "size",
     *         "default",
     *         "extra"
     *      );
     */
    public static function select(array $config, array $optionsArray, array $dataAttributes = array())
    {
        $select = new S($config, $optionsArray);
        return $select->build();
    }

    /**
    *  config array is a multidimensional array like:
    *  array(   id          => ""
    *           name
    *           autofocus
    *           disabled
    *           cols
    *           form
    *           maxlength
    *           name
    *           placeholder
    *           readonly
    *           required
    *           rows
    *           wrap
    *       );
    * since there can be multiple classes it is a seperate array
    */

    public static function textarea(array $config, array $dataAttributes = array())
    {
        $input = new T($config, $dataAttributes);
        return  $input->build();
    }

    public static function button(array $config, array $dataAttributes = array())
    {
        $input = new B($config, $dataAttributes);
        return  $input->build();
    }
}
