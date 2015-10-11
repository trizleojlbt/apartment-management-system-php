<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $primaryKey = "apartment_id";

    public function getBlockAddress(){
    	return $this->hasone("App\Block", "block_id", "block_id");
    }
}
