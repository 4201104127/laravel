<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT = 1;

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'btn-success btn-xs'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'btn-info btn-xs'
        ]
    ];

    protected $hot = [
        1 => [
            'name' => 'Hot',
            'class' => 'btn-success btn-xs'
        ],
        0 => [
            'name' => 'None',
            'class' => 'btn-info btn-xs'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->a_active,'[N\A]');
    }

    public function getHot()
    {
        return array_get($this->hot,$this->a_hot,'[N\A]');
    }
}
