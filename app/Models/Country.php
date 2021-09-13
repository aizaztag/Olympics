<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_code'];

    public function sports()
    {
        return $this->belongsToMany(Sport::class)->withPivot('position');
    }

    public function medelsCount()
    {
        return $this->hasOne(Medel::class)->selectRaw('medels_id, count(*) as aggregate')->groupBy('medels_id');
    }

}
