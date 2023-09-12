<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  Currency  $users
     * @return void
     */
    public function __construct(protected Currency $currency){ }

    /**
     * Display a listing of the offices
     *
     * @return \Iluminate\Http\Response
     */
    public function index() {
        return $this->currency->getAll();
    }
}
