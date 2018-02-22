Laravel 5 Schedule List
=====================

[![Build Status](https://travis-ci.org/hmazter/laravel-schedule-list.svg?branch=master)](https://travis-ci.org/hmazter/laravel-schedule-list)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hmazter/laravel-schedule-list/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/hmazter/laravel-schedule-list/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/hmazter/laravel-schedule-list/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/hmazter/laravel-schedule-list/?branch=master)

[![Latest Stable Version](https://poser.pugx.org/hmazter/laravel-schedule-list/v/stable)](https://packagist.org/packages/hmazter/laravel-schedule-list)
[![Latest Unstable Version](https://poser.pugx.org/hmazter/laravel-schedule-list/v/unstable)](https://packagist.org/packages/hmazter/laravel-schedule-list)
[![Total Downloads](https://poser.pugx.org/hmazter/laravel-schedule-list/downloads)](https://packagist.org/packages/hmazter/laravel-schedule-list)
[![License](https://poser.pugx.org/hmazter/laravel-schedule-list/license)](https://packagist.org/packages/hmazter/laravel-schedule-list)

Laravel 5 package to add a artisan command to list all scheduled artisan commands. 
With schedule time (cron expression), the command to execute and the command description.


## Install

Require this package with composer using the following command:

```bash
composer require hmazter/laravel-schedule-list
```

**Note!** For Laravel version below 5.6 use `0.2.0` tag.

### Laravel 5.5 and above

Install is done


### Laravel < 5.5

After updating composer, add the service provider to the `providers` array in `config/app.php`

```php
Hmazter\LaravelScheduleList\ScheduleListServiceProvider::class,
```

## Usage

Usage from the command line to show all your scheduled artisan commands:

```bash
php artisan schedule:list
```

Outputs:
```
 +--------------+---------------------+--------------+-------------------------------+
 | expression   | next run at         | command      | description                   |
 +--------------+---------------------+--------------+-------------------------------+
 | 0 14 * * 3 * | 2017-08-16 14:00:00 | email:export | Export users to email service |
 +--------------+---------------------+--------------+-------------------------------+
```

### Crontab style output

Use `--cron` to show the output in the same style as it would go in a crontab file.

Outputs:
```
0 14 * * 3 * '/usr/local/bin/php' 'artisan' email:export > '/dev/null' 2>&1`
```

### Verbose output

Use `-vv` to show the full command, including php binary path and output path.

Outputs:
```
+--------------+---------------------+----------------------------------------------------------------+-------------------------------+
| expression   | next run at         | command                                                        | description                   |
+--------------+---------------------+----------------------------------------------------------------+-------------------------------+
| 0 14 * * 3 * | 2017-08-16 14:00:00 | '/usr/local/bin/php' 'artisan' email:export > '/dev/null' 2>&1 | Export users to email service |
+--------------+---------------------+----------------------------------------------------------------+-------------------------------+
```

Using `-vv` together with `--cron` does not change to output from normal `--cron` output.

## Known limitations

Laravel ships with some special scheduling functions ex `between`, `unlessBetween`, `when` and  `skip`
these are not handled right now in the schedule listing output.
They are evaluated at each execution of the schedule and does not define any expression that can be included in the table.