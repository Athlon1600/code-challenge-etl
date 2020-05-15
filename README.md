# Summary
Your mission, should you choose to accept it, is to read and sanitize data from the `accounts.csv` file while using interfaces provided in the `src` directory.

# Description
User supplied data is unknown and inherently cannot be trusted. Data sanitation is a process of transforming untrusted data input into supported format prior to use or storage in a database.

# Setup
`composer install`

# Implementation
`Parser.php` and `Filter.php` classed provided are placeholders and should be populated. You are free to use any tool necessary to accomplish your objective. The only requirement is that `index.php` should run as is, without needing much, if any, modification. You can run `index.php` to see data manipulation and to verify your work.

### Classes
`Parser` class is responsible for interfacing with the `accounts.csv` input file and _extracting_ its data.  
`Filter` class is responsible for _transforming_ supplied file data values into sanitized values ready for permanent storage.  
`Validate` class is responsible for ensuring sanitized values conform to the defined specifications below.  

### Sanitation Specifications
Please sanitize `data/accounts.csv` data according to the following rules:

* Column 1 = Account Number  
  Account number should be a 10 digit string with leading zeros.   
  For example, `12345678` should filter to `0012345678`.  
* Column 2 = Account Name  
  Account name should be a string and should not contain any special characters, only alphanumerics and ` ` (space), `,` (comma), `-` (dash).  
  For example, `@Widget Co., Inc.` should filter to `Widget Co, Inc`.  
* Column 3 = Transaction Fee  
  Transaction fee should be a number with precision of 2. Rounding is allowed.  
  For example, `$.201` should filter to `0.20`.  
* Column 4 = Phone Number  
  Phone number should be a string formatted as ###-###-####.  
  For example, `1 (312) 555-1234` should filter to `312-555-1234`.  
