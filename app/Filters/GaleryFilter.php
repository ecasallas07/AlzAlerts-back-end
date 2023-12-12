<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class GalarieFilter extends ApiFilter {


    protected $safeParams = [
        'title' => ['eq'],
        'description' => ['eq'],
        'tag' => ['eq'],
        'photo' => ['eq'],
        'user_id' => ['eq','lt','lte','gt','gte']
    ];

    //Mapear la column apor si es diferente en la tabla y en l safeParams
    protected $columnMap = [
        'title' => 'galarie_title',
        'description' => 'galarie_description',
        'tag' => 'galarie_tag',
        'photo' => 'galarie_photo',
    ];

    //el operador
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='

    ];


}


