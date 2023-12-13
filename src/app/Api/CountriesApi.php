<?php 

namespace App\Api;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CountriesApi extends ExternalApi 
{
    const BASE_URI = 'https://restcountries.com/v3.1/';
   
    public function __construct()
    {
        parent::__construct(self::BASE_URI);
    }

    /**
     * Get all countries.
     * 
     * Retrieves a list of all countries from the API or cached response.
     * 
     * @return array|bool An array of country data or false if an error occurs.
     */
    public function getAllCountries(array $fields = ['name', 'flags']): array|bool
    {
        try {
            $cacheKey = 'all_countries_' . implode('_', $fields);

            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }

            $response = $this->client->request('GET', 'all?fields=' . implode(',', $fields), [
                'headers' => [
                    'Content-Type'  => 'application/x-www-form-urlencoded',
                ]
            ]);

            $countries = json_decode($response->getBody()->getContents());

            Cache::put($cacheKey, $countries, 60);

            return $countries;
        } catch (\Exception $e) {
            Log::error('Error fetching countries: ' . $e->getMessage());
            return false;
        }
    }
}

