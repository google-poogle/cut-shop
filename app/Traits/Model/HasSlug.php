<?php

namespace App\Traits\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug()
    {
        static::creating(function (Model $model){
            if(!$model->slug) {
                if($model->whereSlug(Str::slug($model->{self::slugFrom()}))->exists()) {
                    $model->slug = Str::slug($model->{self::slugFrom()}, '-').'_1000';
                }else {
                    $model->slug = Str::slug($model->{self::slugFrom()}, '-');
                }

            }
        });
    }
    public static function slugFrom() {
        return 'name';
    }

}
