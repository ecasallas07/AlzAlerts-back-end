<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Resources\V1\AccountResource;
use App\Filters\AccountFilter;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;




class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //El index recibe un request para filtrar por elemento
    public function index() :JsonResponse
    {
        $account = Account::latest()
            ->paginate(6)
            ->get(true);

        $account = AccountResource::collection($account)
            ->response()
            ->get(true);

            return $this->wrapResponse(Response::HTTP_OK,'Success',$account);

        // return  AccountCollection::collection(Account::all());
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
    public function show(Account $account) : JsonResponse
    {
        // $filter = new AccountFilter();
        // $queryItems = $filter->transform($request);
        // $accounts = Account::where($queryItems)->get();

        // if($accounts->isEmpty())
        // {
        //     return response()->json(['error'=> 'NO se encontraron datos'],404);
        // }

        // Se usa ::collection para asegurarse de que en AccountCollection pueda reconocer el id
        return response()->json(['data' => AccountResource::collection($account)],200);
    }

    public function showId($id)
    {
        $account = Account::find($id);
        //En este caso no se usa ::collection porque paso directamente el modelo
        return response()->json(['data'=>  new AccountResource($account)],200);
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
