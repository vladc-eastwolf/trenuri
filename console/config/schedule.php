#!/usr/bin/php
<?php

/**
 * @var \omnilight\scheduling\Schedule $schedule
 */

// Place here all of your cron jobs

// This command will execute ls command every five minutes
$schedule->exec('cron/delete')->hourly();

?>