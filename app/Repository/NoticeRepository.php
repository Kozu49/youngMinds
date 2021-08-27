<?php


namespace App\Repository;
use App\Models\Notice;

class NoticeRepository
{

    /**
     * @var Notice
     */
    private $notice;

    public function __construct(Notice $notice)
    {
        $this->notice = $notice;
    }

    public function all()
    {
        $notice = $this->notice->orderBy('id', 'ASC')->get();
        return $notice;
    }

    public function findById($id)
    {
        $notice = $this->notice->find($id);
        return $notice;
    }
}
