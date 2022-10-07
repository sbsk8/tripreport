<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = DB::table('users');
        $user->name = "山田";
        $user->email = "yamada@test.com";
        $user->password = Hash::make('password');
        $user->save();

        $readUser = DB::table('users')::where('name','山田')->first();
        $this->assertNotNull($readUser);
        $this->assertTrue(Hash::check('password',$readUserpassword));

        AppUser::where('email','yamada@test.com')->delete();
    }
}
