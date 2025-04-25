# ⏱️ Timy Duration Formatter

A framework-agnostic PHP library that provides a solution to the Codewars 'Human Readable Duration Format' kata 
by converting a duration given in seconds into a human-readable format (e.g., '1 hour, 1 minute and 2 seconds').

https://www.codewars.com/kata/human-readable-duration-format

### Rules

✅ Clean code principles  
✅ Liskov Substitution Principle  
✅ Works with any framework (Laravel, Symfony, etc.)  
✅ Unit tested  

### Requirements

```
"php": ">=8.0"
```

### Test results

✅ Now for zero seconds  
✅ One second  
✅ One minute and two seconds  
✅ One minute  
✅ Two minutes  
✅ Fifty nine minutes and fifty nine seconds  
✅ One hour  
✅ One hour one minute and two seconds  
✅ Two hours  
✅ One day  
✅ One day one hour and one second  
✅ Two days  
✅ One year  
✅ One year and two seconds  
✅ Two years  
✅ One year one day one hour one minute and one second  
✅ Hundred eighty two days one hour forty four minutes and forty seconds  
✅ Four years sixty eight days three hours and four minutes  

OK (18 tests, 18 assertions)


### Install

```
composer require ferencbalogh/timy
```

### Usage

```
use Timy\DurationFormatter;

$formatter = new DurationFormatter();

echo $formatter->format(0); // Output: "now"
echo $formatter->format(120); // Output: "2 minutes"
```

### Notes:
This package is open-sourced software licensed under the MIT license

