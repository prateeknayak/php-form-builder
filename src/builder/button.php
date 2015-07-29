<?php
namespace Prateek\FormBuilder\Builder;

class Button extends Common
{
    protected $special ="";

    public function __construct(array $config, array $dataAttributes = array())
    {
        $this->config     = $config;
        $this->dataAttributes   = $dataAttributes;
        $this->optionalConfigs = array("placeholder","value","disabled","checked","extra","class");
        $this->mandatoryConfigs = array("id","name","type","text");
    }

    public function build()
    {
        $mandatory = $this->mandatory();
        $optional = $this->optional();
        $data = $this->dataAttributes();

        return "<button $mandatory $optional $data>$this->special</button>";
    }

}