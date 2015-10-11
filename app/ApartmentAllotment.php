<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentAllotment extends Model
{
    protected $primaryKey = "aa_id";
    protected $table = "apartmentallotments";

    public function getApartment(){
    	return $this->hasOne("App\Apartment", 'apartment_id', 'apartment_id');
    }
}
