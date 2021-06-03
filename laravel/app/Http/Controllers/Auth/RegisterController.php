<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|between:3,255|unique:user',
            'username' => 'required|string|between:3,255|unique:person',
            'email' => 'required|string|between:3,255|unique:user',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $person = Person::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
        User::create([
            'id' => $person->id,
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
        return $person;
    }

    public function showRegistrationForm()
    {
        $posts = Post::where('deleted', '=', false)->where('private', '=', false)->orderBy('id')->paginate(20)->withPath('/api/more_posts');
        return view('auth.register', ["posts" => $posts]);
    }
}
