<?php

namespace App\Http\Controllers\Mcpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CaesarController extends Controller
{
    private $alfabet;

    /**
     * CaesarController constructor.
     * @param $alfabet
     */
    public function __construct()
    {
        $this->alfabet = range('A', 'Z');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('mcpi.caesar.index');
    }

    public function store(Request $request)
    {
        $customMessage = [
            'message.regex' => 'Only latin letters and spaces',
            'message.required' => 'Introduce something',
        ];
        $request->validate([
            'message' => 'required|regex:/^[a-zA-Z \s]+$/',
            'key' => 'required|integer|between:0,26',
            'cryptograma' => 'nullable|regex:/^[a-zA-Z \s]+$/',
        ],
            $customMessage);


        $message = str_split(str_replace(' ', '', strtoupper($request['message'])));
        $key = $request['key'] + 1;
        $datas = [
            'message' => implode('', $message),
            'key' => $key - 1,
        ];
        if ($request['options'] == 'crypt') {
            if (!$request['cryptograma']) {

                $cryptMess = $this->crypt($this->alfabet, $message, $key);
            } else {
                $cryptAlfabet = $this->cryptograma($request['cryptograma']);
                $datas = $datas + [
                        'cryptalpha' => implode('', $cryptAlfabet),
                    ];
                $cryptMess = $this->crypt($cryptAlfabet, $message, $key);
            }


            $datas = $datas + [
                    'cryptmess' => implode('', $cryptMess),
                    'cryptograma' => strtoupper($request['cryptograma']),
                ];
        } else {
            if (!$request['cryptograma']) {
                $decryptMess = $this->decrypt($this->alfabet, $message, $key);
                $datas = $datas + [
                        'cryptmess' => implode('', $decryptMess),
                    ];
            } else {
                $cryptAlfabet = $this->cryptograma($request['cryptograma']);
                $decryptMess = $this->decrypt($cryptAlfabet, $message, $key);
                $datas = $datas + [
                        'cryptalpha' => implode('', $cryptAlfabet),
                        'cryptmess' => implode('', $decryptMess),
                        'cryptograma' => strtoupper($request['cryptograma']),


                    ];
            }
        }
        return redirect()->back()->with('datas', $datas);
    }


    public function crypt($alfabet, $message, $key)
    {
        $message_ = [];
        foreach ($message as $letter) {
            for ($i = 0; $i < count($alfabet); $i++) {
                if ($letter == $alfabet[$i]) {
                    if (($i + $key) >= count($alfabet)) {
                        $message_[] = $alfabet[$i + $key - count($this->alfabet)];
                    } else {
                        $message_[] = $alfabet[$i + $key];
                    }
                }
            }
        }
        return $message_;
    }

    public function decrypt($alfabet, $message, $key)
    {
        $message_ = [];

        foreach ($message as $letter) {
            for ($i = 0; $i < count($alfabet); $i++) {
                if ($letter == $alfabet[$i]) {

//                    dd($i - $key % count($alfabet));
                    if ($i - $key % count($alfabet)<0) {
                        $message_[] = $alfabet[count($alfabet)+($i - $key % count($alfabet))];

                    }
                    else {
                        $message_[] = $alfabet[$i - $key % count($alfabet)];

                    }
                }
            }
        }
        return $message_;
    }

    public function cryptograma($cryptograma)
    {
        $alfabet = range('A', 'Z');
        $cryptograma = str_split(strtoupper($cryptograma));
        $cryptograma = array_merge($cryptograma, $alfabet);
        $cryptograma = array_values(array_unique($cryptograma));

        return $cryptograma;

    }
}
