<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class CardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->has_cards) {
            $this->makeCardsToUser();
        }

        $cards = Auth::user()->cards;

        return view('home', compact('cards'));
    }

    public function getUserCardsApi()
    {
        $user = User::find(request('user'));
        $cards = $user->cards->pluck('number');
       return  response()->json($cards);
    }

    public function setUserCardsApi(){
        return  response()->json(['msg' => 'inseriu']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }

    public function makeCardsToUser()
    {
        for ($i = 2; $i <= 9; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $card = new Card([
                    'number' => $i * $j,
                    'modified_at' => now()->format('Y-m-d H:i:s'),
                    'strenght' => 1
                ]);
                Auth::user()->cards()->save($card);
            }
        }
    }
}
