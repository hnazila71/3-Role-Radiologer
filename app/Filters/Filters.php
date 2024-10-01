<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $aliases = [
        'csrf'     => \CodeIgniter\Filters\CSRF::class,
        'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot' => \CodeIgniter\Filters\Honeypot::class,
        'role'     => \App\Filters\RoleFilter::class, // Register the RoleFilter here
    ];

    public $globals = [
        'before' => [],
        'after'  => [],
    ];

    public $methods = [];

    public $filters = [];
}
