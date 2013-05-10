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
                throw new InvalidArgumentException('columns method only excepts positive integers. Input was: '.$columns);
            }
        }
        return $this->_columns;
    }

}

?>
