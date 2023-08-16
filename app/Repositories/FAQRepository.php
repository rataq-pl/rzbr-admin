<?php

namespace App\Repositories;

use App\Models\FAQ;
use App\Repositories\BaseRepository;

class FAQRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'question',
        'answer'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FAQ::class;
    }

    public function allInArray($arr){
        $tab = [];
        foreach($arr as $id){
            array_push($tab, FAQ::where('id', $id)->first());
            FAQ::where('id', $id)->delete();
        }
        return $tab;
    }
    
    public function updateOrder($arr){
        foreach($arr as $faq){
            FAQ::insert([
                'question' => $faq->question,
                'answer' => $faq->answer,
                'created_at' => $faq->created_at
            ]);
        }
    }
}
