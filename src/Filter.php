<?php

class Filter implements FilterInterface
{
    protected $data;

    /**
     * Set line of data from file
     *
     * @param array $data
     * @return Filter
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

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
    public function getFilteredData()
    {
        $item = $this->data;

        $item['account_number'] = sprintf('%010d', $item['account_number']);
        $item['account_name'] = preg_replace('/[^a-z0-9 ,-]/i', '', $item['account_name']);

        $fee = (float)preg_replace('/[^0-9\.]/', '', $item['transaction_fee']);
        $item['transaction_fee'] = number_format($fee, 2);

        $phone = preg_replace('/[^0-9]/', ' ', $item['phone_number']);
        $phone = trim($phone);
        $phone = preg_replace('/\s+/', '-', $phone);
        $phone = preg_replace('/^1-/', '', $phone);

        // if not already in right format:
        if (!preg_match('/\d{3}-\d{3}-\d{4}$/', $phone, $matches)) {

            // must be a plain integer?
            if (preg_match('/(\d{3})(\d{3})(\d{4})$/', $phone, $matches2)) {
                $phone = sprintf('%d-%d-%d', $matches2[1], $matches2[2], $matches2[3]);
            }
        }

        $item['phone_number'] = $phone;

        return $item;
    }
}
