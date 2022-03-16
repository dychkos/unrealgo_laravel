<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ArticleFilter
{
    private $builder;
    private $request;

    public function __construct(Builder $builder, Request $request) {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply() {
        foreach ($this->request->query() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }


    private function popular($value) {
        if ('yes' == $value) {
            $this->builder->where('sale', true);
        }
    }
}
