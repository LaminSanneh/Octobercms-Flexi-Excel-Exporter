<?php namespace LaminSanneh\FlexiExcelExporter\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Model;

/**
 * Exporter Model
 */
class Exporter extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'laminsanneh_flexiexcelexporter_exporters';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    protected $jsonable = ['columns'];

    public $customMessages = [
        'modelExists' => 'The :attribute file does not exist as a file'
    ];

    protected $rules = [
        'title' => 'required',
        'columns' => 'required',
//        'model' => 'modelExists'
    ];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['model'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getColumnsOptions() {

        $class = $this->model;
        if (!class_exists($class)){
            return [];
        }
        $table = (new $class())->getTable();
        $columns = array_filter(Schema::getColumnListing($table), function($column){
            return $column != 'created_at' && $column != 'updated_at';
        });

        $preparedColumns = [];

        foreach($columns as $column){
            $preparedColumns[$column] = $column;
        }

        return $preparedColumns;
    }

}