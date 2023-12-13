<?php

namespace App\Http\Controllers\Api;

use App\Api\CountriesApi;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;

class CountriesController extends Controller
{
    /**
     * Handle the API request for retrieving all countries.
     *
     * @param CountriesApi $countriesApi The CountriesApi instance.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the collection of countries.
     */
    public function __invoke(CountriesApi $countriesApi): \Illuminate\Http\JsonResponse
    {
        $countries = $countriesApi->getAllCountries();
        
        return response()->json(CountryResource::collection($countries));
    }
}
