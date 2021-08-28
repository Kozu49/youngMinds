<?php


namespace App\Repository;
use App\Models\ClientContact;

class MessageRepository
{
    /**
     * @var ClientContact
     */
    private $message;


    /**
     * PradeshRepository constructor.
     */
    public function __construct(ClientContact $message)
    {
        $this->message = $message;
    }

    public function all()
    {
        $message = $this->message->orderBy('id', 'ASC')->get();
        return $message;
    }
    public function findById($id)
    {
        $message = $this->message->find($id);
        return $message;
    }

}
