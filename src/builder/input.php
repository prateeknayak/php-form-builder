<?php
namespace Prateek\FormBuilder\Builder;

class Input extends Common
{

    public function __construct(array $config, array $dataAttributes = array())
    {
        $this->config     = $config;
        $this->dataAttributes   = $dataAttributes;
        $this->optionalConfigs = array("placeholder","value","disabled","checked","extra","class","list");
        $this->mandatoryConfigs =  array("id","name","type");
    }

    public function build()
    {
        $mandatory = $this->mandatory();
        $optional = $this->optional();
        $data = $this->dataAttributes();
        $label = $this->label();
        $inputTag = "";
        if (isset($this->config['list']) && isset($this->config['datalist'])) {
            $inputTag = "<input $mandatory $optional $data >";
            $inputTag .= "<datalist id = '".$this->config['list']."' >";
            $datalist = $this->config['datalist'];
            foreach ($datalist as $value) {
                $inputTag .= "<option value = '".$value."'>";
            }
            $inputTag .= "</datalist>";
        } else {
            $inputTag = "<input $mandatory $optional $data >";
        }
        
        return $label.$inputTag;

    }


    private function label()
    {
        $label = "";
        if (isset($this->config['label']) && $this->config['label'] != "") {
            $label = "<label for = '".$this->config['id']."'>".$this->config['label']."</label>";
        }
        return $label;
    }
}
