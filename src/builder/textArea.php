<?php
namespace Prateek\FormBuilder\Builder;

class TextArea extends Common
{

    public function __construct(array $config, array $dataAttributes = array())
    {
        $this->config     = $config;
        $this->dataAttributes   = $dataAttributes;
        $this->optionalConfigs = array("autofocus","disabled","cols","form","maxlength","placeholder","readonly","required","rows","wrap","value","class");
        $this->mandatoryConfigs =  array("id","name");
    }

    public function build()
    {

        $mandatory = $this->mandatory();
        $optional = $this->optional();
        $data = $this->dataAttributes();
        $label = $this->label();
        $default = (isset($this->config['value'])) ? $this->config['value'] : "";
        $textarea = "<textarea $mandatory $optional $data >".$default."</textarea>";
        
        return $label.$textarea;
    }


    private function label()
    {
        $label = "";
        if (isset($this->config['label']) && $this->config['label'] != "" ) {
            $label = "<label for = '".$this->config['id']."'>".$this->config['label']."</label>";
        }
        return $label;
    }
}
