<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'lot_number',
      'zone_id',
      'floor_id',
      'category_id'
    ];

    /**
     * Get the zone for the tenant.
     */
    public function zone()
    {
      return $this->belongsTo(Zone::class);
    }

    /**
     * Get the floor for the tenant.
     */
    public function floor()
    {
      return $this->belongsTo(Floor::class);
    }

    /**
     * Get the category for the tenant.
     */
    public function category()
    {
      return $this->belongsTo(Category::class);
    }
}
