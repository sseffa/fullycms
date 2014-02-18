<?php

class BaseModel extends Eloquent{

     public function scopeSearch($query, $search){

        return $query->where(function($query) use ($search){

            $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('content', 'LIKE', "%$search%");
        });
    }
}
