<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserrequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\HTTP\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): View
    {

        
        $users = DB::table('users')->paginate(5);

        return view('users.index', [
            
            'users' => $users,
        ]);

    }

    public function create(): View
    {

      return view('users.create');

    }

  
    public function store(UserRequest $request): RedirectResponse
    {
        
       
           
         User::create($request->validated());

         return redirect()
               ->route('users.create')
               ->with('message','User created successfully');

    }

    public function show(User $user): View
    {
       
        return view('users.show',[

              'user' => $user,
        ]);
  
    }

  
    public function edit(User $user): View
    {
        return view('users.edit',[

              'user' => $user,
        ]);
    }

  
     public function update(UpdateUserRequest $request, User $user): RedirectResponse
     {  

        $data = $request->validated();

        $user->update($data);
    
        return redirect()->route('users.index')
               ->with('message', 'User updated successfully!');

     }
     
      public function destroy(User $user): RedirectResponse
      {   
  
          $user->delete();
  
          return redirect()->route('users.index');
  
      }
  
}

