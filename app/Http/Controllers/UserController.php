<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use PDF;
class UserController extends Controller
{
    public function index(){
        return view('admin/user/index', [
            'title' => 'Data User',
            'users' => User::all(),
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255',
            'email' => 'required|email',
            'jabatan' => 'required|max:255',
            'role_id' => 'required'
        ]);
        
        User::create($validatedData);
        return redirect('admin/user')->with('Success','New Data has been added!');
    }

    public function update(Request $request, $userId)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255',
            'password' => 'nullable|min:5|max:255', // Password boleh nullable agar tidak wajib diisi
            'email' => 'required|email',
            'jabatan' => 'required|max:255',
            'role_id' => 'required'
        ]);
    
        $user = User::findOrFail($userId);
    
        // Jika password diisi, hash password baru
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            // Jika password tidak diisi, jangan update password
            unset($validatedData['password']);
        }
    
        $user->update($validatedData);
    
        return redirect('admin/user')->with('Success', 'Data has been updated!');
    }
    
    public function generateLaporan()
    {
        // Ambil data dari database
        $user = User::all();

        // Generate PDF
        $pdf = PDF::loadView('admin/user/laporan', ['user' => $user]);

        // Download the PDF
        return $pdf->download('laporan-user.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        User::destroy($user->id);
        return redirect('/admin/user')->with('Success','Data has been deleted!');
    }
}
