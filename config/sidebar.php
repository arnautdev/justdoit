<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'menu' => [
        [
            'icon' => 'fa fa-th-large',
            'title' => 'Dashboard',
            'route-name' => 'javascript:;',
//            'route-name' => 'dashboard.index',
            'caret' => true,
            'sub_menu' => [
                [
                    'route-name' => 'administrator.index',
                    'title' => 'Administrators'
                ],
                [
                    'route-name' => 'group.index',
                    'title' => 'Groups'
                ],
                [
                    'route-name' => 'client.index',
                    'title' => 'Clients'
                ],
            ]
        ],
        [
            'icon' => 'fa fa-money-bill-alt',
            'title' => 'Expenses',
            'route-name' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'route-name' => 'category.index',
                    'title' => 'Categories',
                ],
                [
                    'route-name' => 'expense-settings.index',
                    'title' => 'Expenses settings',
                ],
            ]
        ],
        [
            'icon' => 'fa fa-chart-pie',
            'title' => 'Monthly reports',
            'route-name' => 'monthly-reports.index',
            'active-routes' => ['category-expenses.*', 'monthly-reports.*'],
            'caret' => false,
        ],
        [
            'icon' => 'fa fa-chart-line',
            'title' => 'My Goals',
            'route-name' => 'goal.index',
            'caret' => false,
        ],
        [
            'icon' => 'fa fa-list',
            'title' => 'TODO list history',
            'route-name' => 'todo-list.index',
            'caret' => false,
        ],
        [
            'icon' => 'fa fa-circle-notch',
            'title' => 'Life circle',
            'route-name' => 'life-circle.index',
            'caret' => false,
        ],
    ]
];
