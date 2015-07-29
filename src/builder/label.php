<?php
namespace Prateek\FormBuilder\Builder;

class Label extends Common
{
    protected $special = "";

    public function __construct(array $config, array $dataAttributes = array())
    {
        $this->config     = $config;
        $this->dataAttributes   = $dataAttributes;
        $this->optionalConfigs = array("class");
        $this->mandatoryConfigs =  array("for", "text");
    }

    public function build()
    {
        $mandatory = $this->mandatory();
        $optional = $this->optional();
        $data = $this->dataAttributes();

        return "<label $mandatory $optional $data>$this->special</label>";
    }

}