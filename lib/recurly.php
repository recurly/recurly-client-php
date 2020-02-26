<?php

namespace Recurly;

define('Recurly\STRICT_MODE', getenv("RECURLY_STRICT_MODE") == 'true');

if (STRICT_MODE) {
    echo "[Recurly] [WARNING] STRICT_MODE enabled. This should only be used for testing purposes." . PHP_EOL;
}
