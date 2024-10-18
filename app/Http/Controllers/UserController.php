<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\String\ByteString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $users = User::where('name', 'LIKE', '%'.$request->search_user.'%')->orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Name harus Disii',
            'email.required' => 'Email Harus diisi',
            'password.required' => 'Password harus diisi',
            'role.required' => 'Role harus diisi',
        ]);

        $proses = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        if ($proses) 
        {
            return redirect()->route('users.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('failed', 'Data Gagal Ditambahkan');
        }

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $users = User::where('id', $id)->first();
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Name harus Disii',
            'email.required' => 'Email Harus diisi',
            'password.required' => 'Password harus diisi',
            'role.required' => 'Role harus diisi',
        ]);

        $proses = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        if ($proses) {
            return redirect()->route('users.index')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->back()->with('failed', 'Data Gagal Diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $proses = User::where('id', $id)->delete();
        if ($proses) {
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('failed', 'Data Gagal Dihapus');
        }
    }

    // ###------###
    // FUNCTION LOGIN
    // ###------###

    public function showLogin() {
        return view('dashboard.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login Berhasil');
        } else {
            return redirect()->back()->with('failed', 'Login Gagal');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
