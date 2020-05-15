<?php
require_once __DIR__ . '/vendor/autoload.php';

// Setup terminal helper
$cliMate = new League\CLImate\CLImate();

// Setup file parser
$parser = new Parser();
$parser->fileOpen('data/accounts.csv');

$filter = new Filter();
$validate = new Validate();

while ($data = $parser->parse()) {
    // Filter line of data
    $filteredData = $filter->setData($data)->getFilteredData();

    // Check if the filtered data conforms to our defined specifications
    $validatedData = $validate->setData($filteredData)->isValidData();

    // Iterate through every column
    foreach ($data as $key => $value) {
        $isValid = $validatedData[$key] ? 'TRUE' : 'FALSE';

        $cliMate->info()->inline('Filtered ');
        $cliMate->cyan()->inline($value);
        $cliMate->info()->inline(' to ');
        $cliMate->cyan()->inline($filteredData[$key]);
        $cliMate->info()->inline(' and it validates to ');
        $cliMate->cyan($isValid);
    }
}

$parser->fileClose();
