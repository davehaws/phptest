<?php

class Pascal {

    private $levels;

    public function __construct($levels) {
        if (!is_int($levels) || $levels < 1) {
            throw new InvalidArgumentException("Must pass in a positive integer. '$levels' is not valid.");
        }
        $this->levels = $levels;
    }

    private function getNextPascalLevel(array $previous) {
        $count = count($previous);

        $elements = [];
        $max = 0;
        for ($i = 0; $i < $count+1; $i++) {
            // First and last element will be one
            if ($i == 0 || $i == $count) {
                $int = 1;
            } else {
                // Otherwise, add together the two integers above
                $int = $previous[$i-1] + $previous[$i];
            }
            $elements[] = $int;
            if ($int > $max) {
                $max = $int;
            }
        }
        return [$elements, $max];
    }

    private function getPascalIntegerArraysAndMax() {
        $all_arrays = [];
        $elements = [];
        $max_num = 0;
        for ($i = 0; $i < $this->levels; $i++) {
            $last_level = count($all_arrays) ? $all_arrays[$i-1] : [];
            list($elements, $max_num) = $this->getNextPascalLevel($last_level);

            $all_arrays[] = $elements;
        }

        return [$all_arrays, $max_num];
    }

    private function convertLevelArrayToString(array $level, $int_len) {
        $strings = [];
        foreach ($level as $int) {
             $strings[] = str_pad($int, $int_len, ' ', STR_PAD_BOTH);
        }

        // We buffered everything, but last number can't have spaces to the right
        $last_index = count($strings) - 1;
        $strings[$last_index] = rtrim($strings[$last_index]);

        $buffer = str_pad('', $int_len);
        return implode($buffer, $strings);
    }

    private function convertLevelArraysToStrings(array $all_levels, $int_len) {
        $strings = [];
        foreach ($all_levels as $level) {
            $strings[] = $this->convertLevelArrayToString($level, $int_len);
        }
        return $strings;
    }

    private function centerStrings(array $strings, $int_len) {
        $centered_strings = [];

        // Start with most amount of padding we need, then will take less and less of it
        $padding = str_pad('', ($this->levels - 1)*$int_len);

        foreach ($strings as $string) {
            $centered_strings[] = $padding . $string;
            $padding = substr($padding, 0, -1*$int_len);
        }
        return $centered_strings;
    }

    public function output() {
        list($all_levels, $max_int) = $this->getPascalIntegerArraysAndMax();
        $int_len = strlen("$max_int");

        $level_strings = $this->convertLevelArraysToStrings($all_levels, $int_len);

        $centered_strings = $this->centerStrings($level_strings, $int_len);

        $triangle_string = implode("\r\n", $centered_strings);

        return $triangle_string;
    }
}
