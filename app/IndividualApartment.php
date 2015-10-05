<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class IndividualApartment extends Model
{
	protected $table = "individualaparments";
    protected $primaryKey = "ia_id";

    public function getApartment(){
    	return $this->hasOne("App\Apartment", "apartment_id", "apartment");
    }

}
