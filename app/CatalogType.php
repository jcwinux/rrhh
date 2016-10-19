<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogType extends Model
{
    public function catalogs()
	{	return $this->hasMany('App\Catalog');
	}
}
