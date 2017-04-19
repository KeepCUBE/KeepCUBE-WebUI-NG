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
        return $this->packCommand($route, $command->command_scheme['name'].$code);
    }
    public function packCommand(Route $route, $code) {
        $header = '';
        foreach($route->getDescendantsAndSelf() as $child) {
            $header .= strtoupper("#{$child->code}");
        }
        return "{$header}#{$code};";
    }
    private function formatValue($value) {
        switch ($value) {
            case is_string($value):
                return "&{$this->sanitizeString($value)}&";
            case is_array($value):
                return '&'.implode('',$this->sanitizeString($value)).'&';
            default:
                return $value;
        }
    }
    private function sanitizeString($value) {
        return str_replace(["#",";"],'',$value);
    }
}