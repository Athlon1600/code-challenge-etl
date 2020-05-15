<?php

class Parser implements ParserInterface
{
    protected $fh;

    /**
     * Open file for reading
     *
     * @param string $filepath
     */
    public function fileOpen($filepath)
    {
        $this->fh = fopen($filepath, 'r');
    }

    /**
     * Close file
     */
    public function fileClose()
    {
        fclose($this->fh);
    }

    /**
     * Read one line of data from the file and return an associative array
     * with column headers as keys
     *
     * Return false when EOF is reached.
     *
     * @return array[
     *     'account_number'  => String,
     *     'account_name'    => String,
     *     'transaction_fee' => String,
     *     'phone_number'    => String
     * ]|false
     */
    public function parse()
    {
        $line = fgets($this->fh);

        if (!$line) {
            return false;
        }

        $temp = explode('|', trim($line));

        return array(
            'account_number' => $temp[0],
            'account_name' => $temp[1],
            'transaction_fee' => $temp[2],
            'phone_number' => $temp[3]
        );
    }
}
