<?php

namespace Modules\CupAnag\Models;

use Gecche\Cupparis\App\Breeze\Breeze;


class CupAnagSede extends Breeze {

    protected $table = "cup_anag_sedi";

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
        'organizzazione' => [self::BELONGS_TO, 'related' => \App\Models\CupAnagAnagrafica::class,'foreignKey' => 'organizzazione_id'],

        'comune' => [self::BELONGS_TO, 'related' => \App\Models\CupGeoComune::class,'foreignKey' => 'comune_id'],

//        'tickets' => [self::HAS_MANY, 'related' => 'App\Models\Ticket'],
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

    public $columnsForSelectList = ['codice','nome_it'];
    //['id','nome_it'];

    public $defaultOrderColumns = ['codice' => 'ASC', 'nome_it' => 'ASC'];
    //['cognome' => 'ASC','nome' => 'ASC'];

    public $columnsSearchAutoComplete = ['codice','nome_it'];

    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 100;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';

    public function createReferredDataComuneId()
    {
        $relationNameId = 'comune_id';
        $relationName = 'comune';
        if ($this->getKey() && $this->$relationNameId) {
            return [
                'nome_it' => $this->$relationName->nome_it,
                'sigla_provincia' => $this->$relationName->sigla_provincia,
                'nazione_iso3' => $this->$relationName->nazione_iso3,
            ];
        }
        return [
            'nome_it' => null,
            'sigla_provincia' => null,
            'nazione_iso3' => null,
        ];
    }

}
