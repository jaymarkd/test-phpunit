<?php
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{

    public function testGetAllUser(){

        // Method, Route, Data Params, Headers
        $response = $this->json('GET',route('user.indexs'),[],[])

        ->seeStatusCode(200)

        ->seeJsonStructure([
            '*'=> [
               'id',
               'name',
               'email',
            ]
        ]);

    }

    public function testCreateUser()
    {

        $user = [
            'name' => 'TEST',
            'email' => 'test@gmail.com'
        ];

        $response = $this->json('POST',route('user.indexs'),$user,[])
        ->seeStatusCode(201);

        // $query = DB::table('users')->get();

        // dd($query);

    }

    public function testShouldErrorNameOnCreateUser()
    {

        $user = [
            'email' => 'test@gmail.com'
        ];

        $response = $this->json('POST',route('user.indexs'),$user,[])
        ->seeStatusCode(422);

    }
}

