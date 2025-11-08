<?php
namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    
    public function index()
    {
        return view('patient.profile', [
            'user' => Auth::user() 
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'tinggi_badan' => 'nullable|integer|min:50|max:300',
            'berat_badan' => 'nullable|integer|min:1|max:500',
        ]);

        $user->update($validated);

        
        return response()->json([
            'status' => 'success',
            'message' => 'Profil berhasil diperbarui.',
            'user' => $user 
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);
        if (!Hash::check($validated['current_password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password lama Anda tidak sesuai.'
            ], 422); 
        }
        $user->update([
            'password' => Hash::make($validated['password'])
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Password berhasil diganti.'
        ]);
        
    }
}