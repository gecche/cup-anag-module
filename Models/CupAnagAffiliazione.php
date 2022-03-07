<?php

namespace Modules\CupAnag\Models;

use App\Models\Attachment;
use App\Models\CupAnagContatto;
use App\Models\CupAnagIndirizzo;
use App\Models\CupAnagNaturaGiuridica;
use App\Models\CupAnagProfessione;
use App\Models\CupAnagStatoCivile;
use App\Models\CupAnagTipologiaAnagrafica;
use App\Models\CupGeoComune;
use App\Models\CupGeoNazione;
use App\Models\Foto;
use Gecche\Cupparis\App\Breeze\Breeze;


class CupAnagAffiliazione extends Breeze {

    protected $table = "cup_anag_affiliazioni";

    public $ownerships = true;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    protected $guarded = [
        'id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public static $relationsData = [

        'attachments' => [self::MORPH_MANY, 'related' => Attachment::class, 'name' => 'mediable'],

        'organizzazione' => [self::BELONGS_TO, 'related' => \App\Models\CupAnagAnagrafica::class,'foreignKey' => 'organizzazione_id'],
        'affiliata' => [self::BELONGS_TO, 'related' => \App\Models\CupAnagAnagrafica::class,'foreignKey' => 'affiliata_id'],
        'sede' => [self::BELONGS_TO, 'related' => \App\Models\CupAnagSede::class,'foreignKey' => 'sede_id'],
        'tipologia' => [self::BELONGS_TO, 'related' => \App\Models\CupAnagTipologiaAffiliazione::class, 'foreignKey' => 'tipologia_id'],
    ];

    public $appends = [
        //'mainrole'
    ];

    public static $rules = array(
        //'name' => 'required|between:4,255|unique:users,name',
        //'email' => 'required|email|unique:users,email',
//        'password' => 'required|alpha_num|between:4,16|confirmed',
//        'password_confirmation' => 'required|alpha_num|between:4,16',
//        'nome' => 'between:1,255',
//        'cognome' => 'between:1,255',
    );

    public $columnsForSelectList = ['id'];
    //['id','nome_it'];

    public $defaultOrderColumns = ['id' => 'ASC', ];
    //['cognome' => 'ASC','nome' => 'ASC'];

    public $columnsSearchAutoComplete = ['id'];

    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 100;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';


}
