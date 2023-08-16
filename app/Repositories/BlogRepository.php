<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'url',
        'image',
        'content'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Blog::class;
    }

    public function byDescIds($limit){
        return Blog::orderByDesc('id')->paginate($limit);
    }
}
