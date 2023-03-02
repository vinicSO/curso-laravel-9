<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
    
    public function index(Request $request) {

        $search = $request->search;

        $users = $this->model->getUsers(
            search: $search ?? ''
        );

        $data = [
            'users' => $users
        ];

        return view('users.index', $data);
    }

    public function show(Request $request) {

        $user = $this->model->find($request->id);

        if(!$user) {
            return redirect()->route('users.index');
        }

        $data = [
            'user' => $user
        ];

        return view('users.show', $data);
    }

    public function create(Request $request) {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request) {
        
        $data = $request->only([
            'name',
            'email',
            'password'
        ]);

        $data['password'] = bcrypt($data['password']);

        $this->model->create($data);

        return redirect()->route('users.index');
    }

    public function edit(Request $request) {

        $user = $this->model->find($request->id);

        if(!$user) {
            return redirect()->route('users.index');
        }

        $data = [
            'user' => $user
        ];

        return view('users.edit', $data);
    }

    public function update(StoreUpdateUserFormRequest $request) {
        
        $user = $this->model->find($request->id);
        
        $data = $request->only([
            'name',
            'email'
        ]);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if($user) {
            $user->update($data);
        }

        return redirect()->route('users.index');
    }

    public function destroy(Request $request) {

        $user = $this->model->find($request->id);

        if($user) {
            $user->delete();
        }

        return redirect()->route('users.index');
    }
}