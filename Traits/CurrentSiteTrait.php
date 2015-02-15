<?php

namespace Tee\System\Traits;

use Tee\System\Scopes\CurrentSiteScope;

trait CurrentSiteTrait {

    /**
     * Boot the current site trait
     *
     * @return void
     */
    public static function bootCurrentSiteTrait()
    {
        static::addGlobalScope(new CurrentSiteScope);

        $setSite = function($model) {
            if(!$model->site_id)
                $model->site_id = currentSite()->id;
        };

        static::creating($setSite);
        static::updating($setSite);
    }

    /**
     * Get a new query builder without currentSite
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public static function ignoreCurrentSite()
    {
        return (new static)->newQueryWithoutScope(new CurrentSiteScope);
    }

}