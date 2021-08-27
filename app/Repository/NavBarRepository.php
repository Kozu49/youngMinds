<?php


namespace App\Repository;
use App\Models\NavBar;

class NavBarRepository
{
    /**
     * @var NavBar
     */
    private $navbar;

    public function __construct(NavBar $navbar)
    {
        $this->navbar = $navbar;
    }

    public function all()
    {
        $navbar = $this->navbar->orderBy('id', 'ASC')->get();
        return $navbar;
    }

    public function findById($id)
    {
        $navbar = $this->navbar->find($id);
        return $navbar;
    }

}
