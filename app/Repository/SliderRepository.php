<?php


namespace App\Repository;

use App\Models\Slider;

class SliderRepository
{
    /**
     * @var Slider
     */
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function all()
    {
        $slider = $this->slider->orderBy('id', 'ASC')->get();
        return $slider;
    }

    public function findById($id)
    {
        $slider = $this->slider->find($id);
        return $slider;
    }
}
