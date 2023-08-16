<?php

namespace App\Repositories;

use App\Models\ContactForm;
use App\Repositories\BaseRepository;

class ContactFormRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'phone',
        'content'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ContactForm::class;
    }
}
