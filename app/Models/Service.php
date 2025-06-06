<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $primaryKey = 'service_id';

    protected $casts = [
        'is_visible' => 'boolean'
    ];

    public function group()
    {
        return $this->belongsTo(ServiceCategoryGroup::class, 'group_id')->where('is_visible', 1);
    }

    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class, 'service_id', 'service_id')
            ->where('is_visible', 1)->where('locale', app()->getLocale())->first();
    }

    public function visibleTranslations($locale)
    {
        return $this->translations()->where('locale', $locale);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', 1);
    }

    public function translation($lang = 'uk'){
        return $this->hasOne(ServiceTranslation::class, 'service_id', 'service_id')->where('locale', $lang)->first();
    }
}
