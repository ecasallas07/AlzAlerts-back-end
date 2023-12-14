<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class VoiceNotesFilter extends ApiFilter {


    protected $safeParams = [
        'title' => ['eq'],
        'description' => ['eq'],
        'audio' => ['eq']
    ];

    //Mapear la column apor si es diferente en la tabla y en l safeParams
    protected $columnMap = [
        'title' => 'voice_notes_title',
        'description' => 'voice_notes_description',
        'audio' => 'voice_notes_audio'
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
