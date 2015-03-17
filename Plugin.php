<?php namespace LaminSanneh\FlexiExcelExporter;

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

}
