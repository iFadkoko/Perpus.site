<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AdminKelolaUserController extends Controller
{
    //view data
    public function index(){
        $users = User::all();
        return view('admin.kelolauser', ['users' => $users]);
    }
    
    //edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editkelolauser', ['user'=> $user]);
    }
    //update
    public function update(Request $request, $id){

        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'no_Telepon' => 'required|string|max:255',
            'usertype' => 'required|string|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.kelolauser');
        }

        public function destroy($id){
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('admin.kelolauser');
        }
        
}

