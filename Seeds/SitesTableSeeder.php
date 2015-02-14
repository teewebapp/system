<?php

namespace Tee\System\Seeds;

use Tee\System\Models\Site;
use Seeder, Eloquent;

class SitesTableSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();

        Site::create(array(
            'name' => 'Default',
            'slug' => 'default',
        ));
    }
    
}