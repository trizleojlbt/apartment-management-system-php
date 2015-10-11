<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class IndividualApartment extends Model
{
	protected $table = "individualapartments";
    protected $primaryKey = "ia_id";

    public function getApartment(){
    	return $this->hasOne("App\Apartment", "apartment_id", "apartment_id");
    }

    public function getOwner(){
    	return $this->hasOne("App\Owner", "owner_id", "owner_id" );
    }

}
