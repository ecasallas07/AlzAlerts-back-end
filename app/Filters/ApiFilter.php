<?php

namespace App\Filters;
use Illuminate\Http\Request;


class ApiFilter {

    //Parametros para filtrar por los modelos
    protected $safeParams = [

    ];

    //
    protected $columnMap = [

    ];

    //
    protected $operatorMap = [];

    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach($this->safeParams as $param => $operators )
        {
            $query = $request->query($param);
            //TODO: Si no le paso parametro muestra normal todos los elementos
            if(!isset($query))
                continue;
            //TODO: Mapeo que el param no es el mismo nombre de la columna entonces en el column Map le doy el nombre
            $column =  $this->columnMap[$param] ?? $param;

            foreach($operators as $operator)
            {
                if(isset($query[$operator]))
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }

        }

        return $eloQuery;
    }

}

