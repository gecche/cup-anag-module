<?php

namespace App\Models\Relations;

trait CupAnagSedeRelations
{

    public function organizzazione() {

        return $this->belongsTo(\App\Models\CupAnagAnagrafica::class, 'organizzazione_id', null, null);

    }

    public function comune() {

        return $this->belongsTo(\App\Models\CupGeoComune::class, 'comune_id', null, null);

    }
}
