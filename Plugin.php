<?php namespace LaminSanneh\FlexiExcelExporter;

use Backend\Facades\Backend;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\App;
use System\Classes\PluginBase;

/**
 * FlexiExcelExporter Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'FlexiExcelExporter',
            'description' => 'A flexible excel exporter for your octobercms models',
            'author'      => 'LaminSanneh',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerNavigation()
    {
        return [
            'flexiexcelexporter' => [
                'label'       => 'Flexi Excel Exporter',
                'url'         => Backend::url('laminsanneh/flexiexcelexporter/exporters'),
                'icon'        => 'icon-bullhorn',
                'permissions' => ['laminsanneh.flexiexcelexporter.*'],
                'order'       => 500,

                'sideMenu' => [
                    'faqgroups' => [
                        'label'       => 'Flexi Excel Exporter',
                        'url'         => Backend::url('laminsanneh/flexiexcelexporter/exporters'),
                        'icon'        => 'icon-pencil',
                        'permissions' => ['laminsanneh.flexiexcelexporter.*'],
                    ]
                ]

            ]
        ];
    }

    public function boot() {

        // Service provider
        App::register('\Maatwebsite\Excel\ExcelServiceProvider');

        // Register alias
        $alias = AliasLoader::getInstance();
        $alias->alias('Excel', '\Maatwebsite\Excel\Facades\Excel');
    }
}
