<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public function catalog_types()
	{	return $this->belongsTo('App\CatalogType');
	}
}
