<?php

namespace Config;

use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use App\Filters\Authorization;
use App\Filters\Authentication;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Config\Filters as BaseFilters;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'isLoggedIn'    => Authentication::class,
        'isGranted'     => Authorization::class,
        
        // --- NEW ACTIVITY RBAC FILTERS ---
        'auth'    => \App\Filters\AuthFilter::class,
        'student' => \App\Filters\StudentFilter::class,
        'teacher' => \App\Filters\TeacherFilter::class,
        'admin'   => \App\Filters\AdminFilter::class,
    ];

    public array $required = [
        'before' => [
            'forcehttps', 
            'pagecache',  
        ],
        'after' => [
            'pagecache',   
            'performance', 
            'toolbar',     
        ],
    ];

    public array $globals = [
        'before' => [
            'isLoggedIn' => ['except' => ['/', 'register', 'login', 'unauthorized']], 
            'isGranted'  => ['except' => ['/', 'register', 'login', 'logout', 'blocked', 'unauthorized', 'about', 'contact', 'profile', 'profile/*', 'students', 'students/*', 'student/*', 'admin/*', 'dashboard']],
        ],
        'after' => [
            // ...
        ],
    ];

    public array $methods = [];
    public array $filters = [];
}