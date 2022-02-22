<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\GameService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * @var GameService
     */
    private $service;

    /**
     * @param GameService  $service
     */
    public function __construct(GameService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return view('game.index');
    }

    public function secureLink($hash)
    {
        $user = User::where('secure_link', $hash)->first();

        if (!$user) {
            return redirect()->route('home')->with(['error' => 'User not found']);
        }

        if ($user->secure_date_to < Carbon::now()) {
            return redirect()->route('home')->with(['error' => 'Link has expired']);
        }

        Auth::login($user);

        return redirect()->route('game.index');
    }

    public function lucky()
    {
        return response()->json($this->service->getResult());
    }

    public function history()
    {
        $histories = $this->service->getHistory();

        return view('game.history', compact('histories'));
    }
}
