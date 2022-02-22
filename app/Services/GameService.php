<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GameService
{
    /**
     * @return float[]|int[]
     */
    public function getResult()
    {
        $randomNumber = $this->randomNumber(0, 1000);

        $result = $randomNumber % 2 === 0 ? 1 : 0;

        $profit = $result ? $this->getProfit($randomNumber) : 0;

        Game::create([
            'user_id' => Auth::id(),
            'number' => $randomNumber,
            'result' => $result,
            'profit' => $profit,
        ]);

        return [
            'number' => $randomNumber,
            'profit' => round($profit, 2),
            'result' => $result
        ];
    }

    /**
     * @param $randomNumber
     *
     * @return float|int
     */
    private function getProfit($randomNumber)
    {
        switch ($randomNumber) {
            case $randomNumber >= 900:
                $profit = $randomNumber * 0.7;
                break;
            case $randomNumber >= 600:
                $profit = $randomNumber * 0.5;
                break;
            case $randomNumber >= 300:
                $profit = $randomNumber * 0.3;
                break;
            case $randomNumber < 300:
                $profit = $randomNumber * 0.1;
                break;
            default:
                $profit = 0;
        }

        return $profit;
    }

    /**
     * @param int $min
     * @param int $max
     * @param int $mul
     *
     * @return float|int
     */
    private function randomNumber($min = 0, $max = 1, $mul = 1)
    {
        return mt_rand($min * $mul, $max * $mul) / $mul;
    }

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getHistory($limit = 3)
    {
        return Game::where('user_id', Auth::id())->limit($limit)->orderByDesc('id')->get();
    }
}
