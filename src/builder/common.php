<?php 
namespace Prateek\FormBuilder\Builder;
use Prateek\FormBuilder\Exceptions\InvalidArgumentException as IA;

abstract class Common
{
    protected $dataAttributes = array();
    protected $config = array();
    protected $optionalConfigs = array();
    protected $mandatoryConfigs =  array();

    protected function mandatory()
    {
        $mandatoryString = "";
        foreach ($this->mandatoryConfigs as $value) {
            if (array_key_exists($value, $this->config)) {
                if ("text" === $value) {
                    $this->special .= $this->config[$value];
                } else {
                    $mandatoryString .= " $value = ".$this->config[$value];
                }
            } else {
                throw new IA("Missing attributes for input field $value", 8100);
            }
        }

        return $mandatoryString;
    }

    protected function optional()
    {
        $optionalString = "";
        foreach ($this->optionalConfigs as $value) {
            if (array_key_exists($value, $this->config)) {
                if ("default" === $value) {
                    continue;
                } elseif (('readonly' === $value ||'checkbox' === $value || 'disabled' === $value ) && (1 === $this->config[$value])) {
                    $optionalString .= " $value = '".$value."'";
                } elseif ('extra'=== $value) {
                    $optionalString .= " '".$this->config[$value]."'";
                } elseif ('readonly' !== $value && 'checkbox' !== $value && 'disabled' !== $value && 'extra'!== $value ) {
                    $optionalString .= " $value = '".$this->config[$value]."'";
                }
            }
        }
        return $optionalString;
    }

    protected function dataAttributes()
    {
        $dataString = "";
        if (count($this->dataAttributes) > 0) {
            foreach ($this->dataAttributes as $key => $value) {
                $dataString .= "  data-$key = $value";
            }
        }

        return $dataString;
    }

    protected function isMultidimensional($optionsArray)
    {
        $check = array_filter($optionsArray, 'is_array');
        if (count($check)>0) {
            return true;
        }
        return false;
    }


}