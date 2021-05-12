<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|max:255',
            'password' => 'required',
        ]);

        $credential = $request->only('email', 'password');

        if(!Auth::attempt($credential)){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function github(){
        // alihkah pengguna ke permitaan login github
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function githubRedirect(){
        // mengambil request dari github
        $user = Socialite::driver('github')->stateless()->user();

        // jika user belom ada, daftarkan dulu
        // jika user sudah ada, langusng login

        $create = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'username' => $user->nickname,
            'password' => Hash::make(Str::random(20)),
        ]);
        
        Auth::login($create);

        return redirect()->route('dashboard');
    }
}
