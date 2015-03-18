<?php namespace LaminSanneh\FlexiExcelExporter\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Excel;
use Illuminate\Support\Facades\Redirect;
use LaminSanneh\FlexiExcelExporter\Models\Exporter;
use October\Rain\Support\Facades\Flash;

/**
 * Exporters Back-end Controller
 */
class Exporters extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('LaminSanneh.FlexiExcelExporter', 'flexiexcelexporter', 'exporters');
    }

    public function onExport($exportId = null) {

        $exporter = Exporter::find($exportId);
        $result = Excel::create($exporter->title, function($excel) use($exporter) {

            $excel->sheet($exporter->title, function($sheet) use($exporter) {

                $sheet->setOrientation('landscape');
                $columns = $exporter->columns;
                $data = [
                    $columns
                ];

                $class = $exporter->model;
                $instance = new $class();

                // get the data for the columns above
                $rows = $instance->newQuery()->get($columns)->toArray();
                foreach($rows as $row){
                    array_push($data, $row);
                }

                $sheet->fromArray($data, null, 'A1', true);
            });

        })->store('xls');

        Flash::success('Downloaded excel file');
        $url = ['downloadurl' => url('/storage/exports/'.$result->filename.".".$result->ext)];
        return $url;
    }
}