<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Resources\AccountCollection;
use App\Filters\AccountFilter;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;



class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //El index recibe un request para filtrar por elemento
    public function index() :JsonResponse
    {
        $account = Acount::latest()
            ->paginate(6)
            ->getData(true);

        $account = AccountResource::collection($account)
            ->response()
            ->getData();

            return $this->wrapResponse(Response::HTTP_OK,'Success',$account);

        // return  AccountCollection::collection(Account::all());
    }


    public function wrapResponse(int $code, string $message, ?array $account = []): JsonResponse
    {
        $result = [
            'code' => $code,
            'message' => $message
        ];

        if(count())
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) : JsonResponse
    {
        $filter = new AccountFilter();
        $queryItems = $filter->transform($request);
        $accounts = Account::where($queryItems)->get();

        if($accounts->isEmpty())
        {
            return response()->json(['error'=> 'NO se encontraron datos'],404);
        }

        // Se usa ::collection para asegurarse de que en AccountCollection pueda reconocer el id
        return response()->json(['data' => AccountCollection::collection($accounts)],200);
    }

    public function showId($id)
    {
        $account = Account::find($id);
        //En este caso no se usa ::collection porque paso directamente el modelo
        return response()->json(['data'=>  new AccountCollection($account)],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
