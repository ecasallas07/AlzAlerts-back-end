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
use PDOException;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //El index recibe un request para filtrar por elemento
    public function index() :JsonResponse
    {
        //TODO: Implement correct
            $account=Account::all();
            return response()->json([
                'success'=> true,
                'data' => AccountResource::collection($account)
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request) :JsonResponse
    {
        // TODO: implement correct
        try{
            $account = Account::create($request->all());
            return response()->json([
                'success'=> true,
                'message' => 'Create succesfully',
                'create' => $account
            ],201);

        }catch(PDOException $e)
        {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) : JsonResponse
    {
        // TODO: implement correct
            $filter = new AccountFilter();
            $items = $filter->transform($request);
            $account = Account::where($items)->get();

            if($account->isEmpty())
            {
                return response()->json([
                    'error' => 'Not exists Data'
                ]);
            }else
            {
                return response()->json([
                    'success' => true,
                    'data' => new AccountResource($request)
                ]);

            }
    }

    public function showId($id)
    {
        // TODO: implement correct
        $account = Account::find($id);
        //En este caso no se usa ::collection porque paso directamente el modelo
        return response()->json([
            'success' => true,
            'update'=>  new AccountResource($account)],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request,$id)
    {
        // TODO: Implement correct
        $account = Account::find($id);
        $account->account_name = $request->account_name;
        $account->account_email = $request->account_email;
        $account->account_password = $request->account_password;
        $account->user_id = $request->user_id;
        $account->save();
        return response()->json([
            'success' => true,
            'eliminate' => new AccountResource($account)
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $account = Account::find($id)->delete();
        return response()->json([
            'eliminated' => $account,
            'success' => true
        ],200);
    }
}
