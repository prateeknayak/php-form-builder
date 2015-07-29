<?php
namespace Prateek\FormBuilder\Builder;

class Form extends Common
{

    public function __construct(array $config, array $dataAttributes = array())
    {
        $this->config     = $config;
        $this->dataAttributes   = $dataAttributes;
        $this->optionalConfigs = array("accept-charset","autocomplete","enctype","novalidate","target","extra");
        $this->mandatoryConfigs =  array("action","method");
    }

    public function startForm()
    {
        $mandatory = $this->mandatory();
        $optional = $this->optional();
        $data = $this->dataAttributes();

        return "<form $mandatory $optional $data >";

    }
    public function closeForm()
    {
        return "</form>";
    }



    public function generateToken()
    {
        $uid = uniqid();
        $_SESSION['uid'] = $uid;
        $hash = base64_encode(hash("SHA512", $uid));
        return $hash;
    }
}
