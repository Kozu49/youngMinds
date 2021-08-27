<?php

namespace App\Repository\Configurations;

use App\Models\Configuration\Country;

class CountryRepository
{
    /**
     * @var Country
     */
    private $country;

    /**
     * CountryRepository constructor.
     */
    public function __construct(Country $country)
    {

        $this->country = $country;
    }

    public function all()
    {
        $result = $this->country->orderBy('country_name', 'ASC')->get();
        return $result;
    }
    public function findById($id)
    {
        $result = $this->country->find($id);
        return $result;
    }
}