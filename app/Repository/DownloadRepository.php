<?php


namespace App\Repository;
use App\Models\Download;

class DownloadRepository
{

    /**
     * @var Download
     */
    private $download;

    public function __construct(Download $download)
    {
        $this->download = $download;
    }

    public function all()
    {
        $download = $this->download->orderBy('id', 'ASC')->get();
        return $download;
    }

    public function findById($id)
    {
        $download = $this->download->find($id);
        return $download;
    }
}
