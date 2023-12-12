<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ReminderFilter extends ApiFilter {


    protected $safeParams = [
        'title' => ['eq'],
        'subject' => ['eq'],
        'date' => ['eq','lt','lte','gt','gte'],
        'time'=> ['eq','lt','lte','gt','gte'],
        'user_id' => ['eq','lt','lte','gt','gte']
    ];

    //Mapear la column apor si es diferente en la tabla y en l safeParams
    protected $columnMap = [
        'title' => 'reminder_title',
        'subject' => 'reminder_subject',
        'date' => 'reminder_date',
        'time' => 'reminder_time'
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

