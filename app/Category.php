<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name'
    ];

    /**
     * Get the tenants for the tenant.
     */
    public function tenants()
    {
      return $this->hasMany(Tenant::class);
    }
}
