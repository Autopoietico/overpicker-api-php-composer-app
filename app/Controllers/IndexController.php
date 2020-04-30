<?php

namespace App\Controllers;

use App\Models\Section;

class IndexController{
    
    public function indexAction(){

        return '../views/index.html';
    }

    public function heroADCAction(){

        return '../public/hero-data/hero-adc.json';
    }

    public function heroCountersAction(){

        return '../public/hero-data/hero-counters.json';
    }

    public function heroIMGAction(){

        return '../public/hero-data/hero-img.json';
    }

    public function heroInfoAction(){

        return '../public/hero-data/hero-info.json';
    }

    public function heroMapsAction(){

        return '../public/hero-data/hero-maps.json';
    }

    public function heroSynergiesAction(){

        return '../public/hero-data/hero-synergies.json';
    }

    public function heroTiersAction(){

        return '../public/hero-data/hero-synergies.json';
    }

    public function mapTypeAction(){

        return '../public/map-data/map-type.json';
    }

    public function mapInfoAction(){

        return '../public/map-data/map-info.json';
    }
}