<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UserFilter extends ApiFilter {


    protected $safeParams = [
        'name' => ['eq'],
        'telephone' => ['eq'],
        'email' => ['eq'],
        'birth_date'=> ['eq','lt','lte','gt','gte'],
        'status' => ['eq'],
        'photo'=>['eq'],
        'user_id' => ['eq','lt','lte','gt','gte']
    ];

    //Mapear la column apor si es diferente en la tabla y en l safeParams
    protected $columnMap = [
        'name' => 'user_name',
        'telephone' => 'user_telephone',
        'birth_date' => 'user_birth_date',
        'status' => 'user_status',
        'photo' => 'user_photo',
        'email' => 'user_email'
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
