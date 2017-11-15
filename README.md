# Cron health checker

This Magento 1 module schedules a cron job to send a HTTP GET request
to [healthchecks.io](https://healthchecks.io) monitoring service (or a similar service) every hour. When the cron jobs are not running per the expected schedule, healthchecks.io will send a notification to the store owner. It is then a good idea to check if other Magento cron jobs are running normally.

This monitoring setup will detect various failure scenarios, including:

* system's cron daemon is not running
* Magento cron job runner crashes on startup
* One of the Magento cron jobs runs longer than expected and blocks other jobs from running

## Configuration

System->Configuration->Advanced->System->Cron
Here you will find two fields: 'Enable healthchecks' and 'Healthcheck ping URL'.
If 'Enable healthchecks' is set to 'No', cron job will still be scheduled, it just will not do anything.

## Magento 2

Same module for Magento 2: https://github.com/scandiwebcom/Cron-Health-Checker
