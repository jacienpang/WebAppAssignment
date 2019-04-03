<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'code'
    ];

    /**
     * Get the tenants for the tenant.
     */
    public function tenants()
    {
      return $this->hasMany(Tenant::class);
    }
}
