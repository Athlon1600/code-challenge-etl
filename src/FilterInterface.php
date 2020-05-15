<?php
interface FilterInterface
{
    /**
     * Set line of data from file
     *
     * @param array $data
     * @return Filter
     */
    public function setData(array $data);

    /**
     * Return filtered values for one line of file data
     *
     * @return array [
     *     'account_number'  => String,
     *     'account_name'    => String,
     *     'transaction_fee' => Float,
     *     'phone_number'    => String
     * ]
     */
    public function getFilteredData();
}
