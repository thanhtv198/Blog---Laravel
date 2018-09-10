<?php

return [
    //user
    'user' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'role' => [
            'admin' => 0,
            'manager' => 1,
            'member' => 2,
        ],
        'upload' => 'upload/user',
    ],

    //topic
    'topic' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'paginate' => 5,
    ],

    //post
    'post' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'upload' => 'upload/post',
        'paginate' => 5,
        'recent' => 5,
        'limit' => 10,
    ],

    //
    'tag' => [
        'limit' => 20,
    ],

];
