<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function deactivateLink()
    {
        Auth::user()->deactivateLink();
        Auth::logout();

        return response()->json(['status' => 'ok']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateNewLink()
    {
        $user = Auth::user()->generateNewLink();

        return response()->json(['link' => route('game.secure_link', ['hash' => $user->secure_link])]);
    }
}
