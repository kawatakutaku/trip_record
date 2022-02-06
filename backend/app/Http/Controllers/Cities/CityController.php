<?php

namespace App\Http\Controllers\Cities;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;

class CityController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // TODO: 都市の絞り込みだけを行うようにしたい
    }

}
