<?php

class Para {
    /**
     * Default number of columns
     */

    const DEFAULT_COLUMNS = 72;

    /**
     * Number of columns
     * @var int
     */
    private $_columns = self::DEFAULT_COLUMNS;

    /**
     * Constructor
     * @param int $columns
     */
    public function __constructor($columns) {
        $this->columns($columns);
    }

    /**
     * Get/set number of columns; if $columns is not integer or greater than 0 use default
     * @param int $columns
     * 
     * @assert ()   == 72
     * @assert (8)  == 8
     */
    public function columns($columns = self::DEFAULT_COLUMNS) {
        if (!is_null($columns)) {
            if (is_int($columns) && $columns > 0) {
                $this->_columns = $columns;
            } else {
                throw new InvalidArgumentException('columns method only excepts positive integers. Input was: ' . $columns);
            }
        }
        return $this->_columns;
    }

    public function format_for_web($text) {
        $text = str_replace("\n", "<br/>", $text);
        return str_replace("<br/><br/>", "<p/>", $text);
    }

    public function format($text) {
        $lines = explode("\n\n", $text);
        $result = array_map(function($text) {return $this->format_para($text);}, $lines);
        return implode("\n\n", $result);
    }

    private function format_para($text) {
        $para = '';
        $columns = $this->_columns;
        $cols_left = $columns;
        preg_match_all('/(\S+)/', $text, $matches);

        $words = array();
        foreach($matches[0] as $word) $words[] = $word;
        
        while (($word = array_shift($words))) {
            $word_length = strlen($word);
            if ($cols_left > $word_length) {
                if ($cols_left < $columns)
                    $para .= ' ';
                $para .= $word;
                $cols_left -= $word_length;
            }
            elseif ($word_length <= $columns) {
                $para .= "\n$word";
                $cols_left = $columns - $word_length;
            } else {
                $l = $columns - 1;
                $part = substr($word, 0, $l);
                $word = substr($word, $l, strlen($word) - $l);
                $para .= "\n$part-\n";
                $cols_left = $columns;
                array_unshift($words, $word);
            }
        }
        return $para;
    }

}

?>