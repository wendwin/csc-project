<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller

// INI AUTH MANAGEMENT USER LOGIN 
// JANGAN DI OTAK ATIK!!!!!!
{
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }


    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
            // return redirect()->to('http://dashboard.test/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }


    public function showAddUserForm()
    {
        return view('admin.auth.add-user');
    }

    public function storeNewUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin pustaka pemda,admin csc,admin pspi',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('images/profiles', 'public');
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'profile_image' => $profileImagePath,
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan.');
    }

    public function listUsers(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(6)->withQueryString(); 
        $roles = User::select('role')->distinct()->pluck('role'); 

        return view('admin.auth.users-list', compact('users', 'roles'));
    }


    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.auth.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin pustaka pemda,admin csc,admin pspi',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['old_password'] = [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Password lama tidak cocok.');
                    }
                },
            ];
            $rules['password'] = ['required', 'string', 'min:6', 'confirmed'];
        }

        $validated = $request->validate($rules);
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $user->profile_image = $request->file('profile_image')->store('images/profiles', 'public');
        }
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui.');
    }


    // Hapus user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto profil jika ada
        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }
}


