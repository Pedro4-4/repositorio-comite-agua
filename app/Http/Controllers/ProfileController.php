<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Persona;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function getUsers(Request $request): View
    {
        $personas = Persona::get();
        return view('profile.list', [    'user' => $request->user(), 'personas' => $personas]);
        
    }

    public function edit(Request $request): View
    {
        $persona = Persona::get();
        return view('profile.edit', [    'user' => $request->user(), 'persona' => $persona]);
        
    }

    // public function create(Request $request)
    // {
        //dd( $request->nombre,$request->apellido, $request->dpi, $request->telefono, $request->direccion, $request->observacion,);
         
        // Persona::create([
        //     'sector_id' => 12,
        //     'nombre' => $request->nombre,
        //     'apellido' => $request->apellido,
        //     'dpi' => $request->dpi,
        //     'telefono' => $request->telefono,
        //     'direccion' => $request->direccion,
        //     'observacion' => $request->observacion,
        // ]);
        // return redirect('/users');

    // }

    public function edit2($id)
    {
    // dd($id); 
    
        $persona = Persona::find($id);
        return view('profile.edit2', ['persona' => $persona]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
