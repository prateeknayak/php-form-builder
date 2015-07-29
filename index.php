<?php
namespace Prateek\FormBuilder;

use Prateek\FormBuilder\FormBuilder as F;

require_once("bootstrap.php");
echo F::start(array("action"=>BASE_URL."testSubmit.php","method"=>"POST"));

$monthArray = array();
for ($i = 1;$i <= 12;$i++) {
    $month_num = str_pad($i, 2, 0, STR_PAD_LEFT);
    $month_name = date('F', mktime(0, 0, 0, $i + 1, 0, 0));

    $monthArray[$month_num] =$month_name;
}
$monthMulti = array("2014"=>$monthArray, "2015"=>$monthArray);

// $i = F::input(array());

$i = F::input(array("id"        => "test1",
                    "name"        => "test1",
                    "type"        => "text",
                    "placeholder" => "This is placeholder",
                    "value"       => "This is value",
                    "disabled"    => 0,
                    "checked"     => 0,
                    'label'       => "<span>Text in Span </span>"
            ));

echo $i;

// echo F::label(array("for"=>"test2", "text"=>"Label 2","class"=>"test_label_class"));
$i2 = F::input(array("id"        => "test2",
                     "name"        => "test2",
                     "type"        => "text",
                     "label"       =>  "label 2"
            ));

echo $i2;

echo F::label(array("for"=>"test2", "text"=>"Label 3","class"=>"test_label_class"));
$i3 = F::input(array("id"        => "test3",
                     "name"        => "test3",
                     "type"        => "text",
                     "class"       => "main_form  form_main  test1"
            ));

echo $i3;

$i3 = F::input(array("id"        => "test2",
                     "name"        => "test4",
                     "type"        => "submit",
                     "class"       => "main_form  form_main  test1"
            ));

echo $i3;

echo $s = F::select(array("id"=>"select_test1",
                     "name"=>"select_test_1"), $monthArray );

echo $textArea = F::textarea(array("id"        => "test2",
                     "name"        => "test4",
                     "type"        => "text",
                     "class"       => "main_form  form_main  test1",
                     "placeholder" => "Place it "
            ));

echo $iHTML5 = F::input(array("id"        => "test_list",
                     "name"        => "test_list",
                     "type"        => "text",
                     "class"       => "main_form  form_main  test1",
                     "list" =>"browsers",
                     "datalist"=> array("Internet Explorer","Cirefox","Chrome","Opera","Cafari")
            ));



    echo F::button(array("id"        => "test_1",
                         "name"        => "Button 1",
                         "type"        => "submit",
                         "class"       => "main_form  form_main  test1",
                         "value"    =>"adadadada",
                         "text" =>"button text"
                ));


echo F::close();
