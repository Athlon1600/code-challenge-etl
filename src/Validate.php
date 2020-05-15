<?php
class Validate
{
    /**
     * @var array
     */
    protected $_data;

    /**
     * @var array
     */
    protected $_dataValidated = [];

    public function setData(array $data)
    {
        $this->_data = $data;

        $this->_dataValidated = [];

        return $this;
    }

    public function isValidData()
    {
        if ($this->_data && empty($this->_dataValidated)) {
            $isValid['account_number']  = $this->accountNumber($this->_data['account_number']);
            $isValid['account_name']    = $this->accountName($this->_data['account_name']);
            $isValid['transaction_fee'] = $this->transactionFee($this->_data['transaction_fee']);
            $isValid['phone_number']    = $this->phoneNumber($this->_data['phone_number']);

            $this->_dataValidated = $isValid;
        }

        return $this->_dataValidated;
    }

    public function accountNumber($accountNumber)
    {
        return preg_match('/^[0-9]{10}$/', $accountNumber) === 1;
    }

    public function accountName($accountName)
    {
        // Match any character not in the range ([^]) occuring at least once (+)
        return preg_match('/[^0-9a-zA-Z,\- ]+/', $accountName) === 0;
    }

    public function transactionFee($transactionFee)
    {
        return preg_match('/^[0-9]+\.[0-9]{2}$/', $transactionFee) === 1;
    }

    public function phoneNumber($phoneNumber)
    {
        return preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phoneNumber) === 1;
    }
}
