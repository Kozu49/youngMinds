<?php


namespace App\Repository;
use App\Models\News;

class NewsRepository
{
    /**
     * @var News
     */
    private $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function all()
    {
        $news = $this->news->orderBy('id', 'ASC')->get();
        return $news;
    }

    public function findById($id)
    {
        $news = $this->news->find($id);
        return $news;
    }

}
