<?php


namespace App\Repository;
use App\Models\Contact;

class ContactRepository
{
    /**
     * @var Contact
     */
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function all()
    {
        $contact = $this->contact->orderBy('id', 'ASC')->get();
        return $contact;
    }

    public function findById($id)
    {
        $contact = $this->contact->find($id);
        return $contact;
    }

}
