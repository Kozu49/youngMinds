<?php


namespace App\Repository;
use App\Models\Social;

class SocialRepository
{
    /**
     * @var Social
     */
    private $social;

    public function __construct(Social $social)
    {
        $this->social = $social;
    }

    public function all()
    {
        $social = $this->social->orderBy('id', 'ASC')->get();
        return $social;
    }

    public function findById($id)
    {
        $social = $this->social->find($id);
        return $social;
    }
}
