<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AccountFilter extends ApiFilter {


    protected $safeParams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'password' => ['eq'],
        'user_id' => ['eq','lt','lte','gt','gte']
    ];

    //Mapear la column apor si es diferente en la tabla y en l safeParams
    protected $columnMap = [
        'name' => 'account_name',
        'email' => 'account_email',
        'password' => 'account_password',
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

