<?php

namespace App\Http\Controllers\playfaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayfaireController extends Controller
{
    public function playfaire(Request $request)
    {
        $message = str_split(strtoupper('request'));
        $length = count($message);
        $pairMessage = $this->pairMessage($message, $length);


        return view('mcpi.playfaire.index');
    }

    public function alfaMatrix()
    {
        $matrix = [[]];
        $alfabet = range('A', 'X');
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $matrix[$i][$j] = $alfabet[$i + $j];
            }
        }
        return $matrix;
    }

    public function pairMessage($message, $length)
    {
        $pairs_ = null;
        $i = 0;

        foreach ($message as $letter) {
            $pairs_ [] = $letter;
            if ($letter === $pairs_[$i]) {
                $pairs_[] = 'X';
                $i = $i + 2;
            } else {
                $i++;
            }
        }
        if (!$length % 2 == 0) {
            $pairs_[] = 'X';
        }
        return $pairs_;
    }
}
