<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->paginate(20);

        return view('admin.user.index',['users' => $users]);
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
        ]);

        Session::flash('success', 'User a été ajoutée avec succès !');
        return redirect()->back();
    }

    public function edit(User $user){
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email, $user->id',
            'password' => 'sometimes|min:8',
        ]);


            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->description = $request->description;
            $user->save();


        Session::flash('success', 'User a été modifiée avec succès !');
        return redirect()->back();
    }

    public function destroy(User $user){
        if($user){
            $user->delete();
            Session::flash('success', 'User a été supprimée avec succès !');
        }
        return redirect()->back();
    }

    public function profil()
    {
        $user = auth()->user();
        return view('admin.user.show', compact('user'));



    }

    /**
         * Responds with a welcome message with instructions
         *
         * @return \Illuminate\Http\Response
         */
        public function changeStatus(Request $request)
        {
            $user = User::find($request->user_id);
            $user->status = $request->status;
            $user->save();

            return response()->json(['success'=>'Status change successfully.']);
        }
}
