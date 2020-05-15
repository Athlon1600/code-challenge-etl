<?php
interface ParserInterface
{
    /**
     * Open file for reading
     *
     * @param string $filepath
     */
    public function fileOpen($filepath);

    /**
     * Close file
     */
    public function fileClose();

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
    public function parse();
}
