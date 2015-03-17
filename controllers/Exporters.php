<?php namespace LaminSanneh\FlexiExcelExporter\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

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

        echo $exportId;
    }
}