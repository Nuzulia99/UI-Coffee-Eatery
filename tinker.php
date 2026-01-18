#!/usr/bin/env php
<?php

$basePath = realpath(__DIR__);
$app = require_once $basePath . '/bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->call('tinker', []);

exit($status);
