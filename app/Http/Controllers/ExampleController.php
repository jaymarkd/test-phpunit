<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $user;

    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }
    //

    function index(){

      return response()->json(User::get()->first(), 200);

    }

    function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $data = $request->only(['name','email']);

        User::create( $data );

        return response()->json('added', 201);

    }

}
