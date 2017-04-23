<?php
namespace KC\Services\CommandServices;

use KC\Models\Command\Command;
use KC\Models\Route\Route;

class CommandConvertor {
    public function convert(Command $command, Route $route) {
        $code = '';
        foreach($command->command_scheme['values'] as $key => $value) {
            $value = $this->formatValue($value);
            $code .= strtoupper($key).$value;
        }
        return $this->packCommand($route, '#'.$command->command_scheme['name'].$code.';');
    }
    public function packCommand(Route $route, $code) {
        foreach($route->getDescendantsAndSelf() as $child) {
            $code = addcslashes($code, '&\\');
            if(strtoupper($child->code) === 'NRF') {
                $code = "#NRFA1D&". $code . "&;";
                continue;
            }
            $code = strtoupper("#{$child->code}D&"). $code . "&;";
        }
        return $code;
    }
    private function formatValue($value) {
        switch ($value) {
            case is_numeric($value):
                return (int)$value;
            case is_string($value):
                return "&{$this->sanitizeString($value)}&";
            case is_array($value):
                return '&'.implode(',',array_map([$this, 'sanitizeString'], $value)).'&';
            case is_bool($value):
                return (int)$value;
            default:
                return $value;
        }
    }
    private function sanitizeString($value) {
        return strtolower(str_replace(["#",";"],'',$value));
    }
}