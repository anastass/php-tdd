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
    function __construct($columns = null) {
        $this->setColumns($columns);
    }
    
    /**
     * Set number of columns; if $columns is not integer or greater than 0 use default
     * @param int $columns
     * 
     * @assert ()   == 72
     * @assert (8)  == 8
     */
    public function setColumns($columns = null) {
        if (!is_null($columns)) {
            if (is_int($columns) && $columns > 0) {
                $this->_columns = $columns;
            } else {
                throw new InvalidArgumentException('columns method only excepts positive integers. Input was: ' . $columns);
            }
        }
    }

    /**
     * Get number of columns; if $columns is not integer or greater than 0 use default
     */
    public function getColumns() {
        return $this->_columns;
    }

    /**
     * Used by index.php
     * @param string $text
     * @return string       formatted for web text
     */
    public function format_for_web($text) {
        return str_replace("\n", "<br/>", $this->format($text));
    }

    /**
     * Format text
     * @param string $text      multiple paragraphs
     * @return string           fromatted text
     */
    public function format($text) {
        $text = str_replace(PHP_EOL, "\n", $text);
        $lines = preg_split("/\n([ \t]*\n)+/", $text);
        $result = array_map(function($text) {return $this->format_para($text);}, $lines);
        return implode("\n\n", $result);
    }

    /**
     * Format paragraph
     * @param string $text      text to format
     * @return string           fromatted paragraph
     */
    private function format_para($text) {
        $para = '';
        $columns = $this->_columns;
        $cols_left = $columns;
        preg_match_all('/(\S+)/', $text, $matches);

        $words = array();
        foreach ($matches[0] as $word)
            $words[] = $word;

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