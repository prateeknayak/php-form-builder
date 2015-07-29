<?php
namespace Prateek\FormBuilder\Builder;

class Select extends Common
{
    private $optionsArray = array();

    public function __construct(array $config, array $optionsArray, array $dataAttributes = array())
    {
        $this->config     = $config;
        $this->dataAttributes   = $dataAttributes;
        $this->optionsArray = $optionsArray;
        $this->optionalConfigs = array("value","autofocus","disabled","form","multiple","required","size","default","extra");
        $this->mandatoryConfigs =  array("id","name");
    }

    public function build()
    {
        $mandatory = $this->mandatory();
        $optional = $this->optional();
        $data = $this->dataAttributes();
        $select = $this->buildSelect($mandatory, $optional, $data, $this->optionsArray);
        
        return $select;

    }

    private function buildSelect($mandatory, $optional, $data, $optionsArray)
    {
        if (count($this->optionsArray) > 0) {
            $default = (isset($this->config['default'])) ? $this->config['default'] : "--select--";
            $field_value = (isset($this->config['value'])) ?  $this->config['value'] : null;
            $select = "";
            if ($this->isMultidimensional($optionsArray)) {
                foreach ($optionsArray as $key => $value) {
                    $select .= '<optgroup label="'.$key.'">';
                    $select .= $this->generateOptionsList($value, $field_value);
                    $select .= '</optgroup>';
                }
            } else {
                $select  = "<option>".$default."</option>".$this->generateOptionsList($optionsArray, $field_value);
            }
            return '<select '. $mandatory." ".$optional." ".$data. '>' . $select . '</select>';
        } else {
            throw new \Exception("Options not found for select", 1);
            
        }
    }
    private function generateOptionsList($optionsArray, $field_value = null)
    {
        $options = "";
        $selected = "";
        foreach ($optionsArray as $key => $value) {
            if ($field_value == $value) {
                $selected = "selected";
            }
            $options.= '<option value="' . $key . '" ' . $selected . ' >' . $value . '</option>';
        }
        return $options;
    }


}
