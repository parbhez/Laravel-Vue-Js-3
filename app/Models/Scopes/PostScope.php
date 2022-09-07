<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PostScope implements Scope
{
   
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('id', 'desc');

        $builder->when(request()->has('keyword'), function($q) {
            $q->where(function($q2){
                return $q2->where('title', 'LIKE', '%'. request('keyword') . '%');
            });
        });

       


       
          
    }

}
