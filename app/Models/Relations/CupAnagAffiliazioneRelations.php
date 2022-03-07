<?php

namespace App\Models\Relations;

trait CupAnagAffiliazioneRelations
{
    public function attachments() {

        return $this->morphMany('App\Models\Attachment', 'mediable', null, null, null)
            ->orderBy('ordine','ASC');

    }

    public function organizzazione() {

        return $this->belongsTo(\App\Models\CupAnagAnagrafica::class, 'organizzazione_id', null, null);

    }

    public function affiliata() {

        return $this->belongsTo(\App\Models\CupAnagAnagrafica::class, 'affiliata_id', null, null);

    }

    public function sede() {

        return $this->belongsTo(\App\Models\CupAnagSede::class, 'sede_id', null, null);

    }

    public function tipologia() {

        return $this->belongsTo(\App\Models\CupAnagTipologiaAffiliazione::class, 'tipologia_id', null, null);

    }

}
