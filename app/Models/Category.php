<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOME = 1;

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

    protected $home = [
        1 => [
            'name' => 'Public',
            'class' => 'btn-success btn-xs'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'btn-info btn-xs'
        ]
    ];

    public function getStatus()
    {
    	return array_get($this->status,$this->c_active,'[N/A]');
    }

    public function getHome()
    {
        return array_get($this->home,$this->c_home,'[N/A]');
    }

    public function products()
    {
        return  $this->hasMany(Product::class,'p_category_id');
    }
}
