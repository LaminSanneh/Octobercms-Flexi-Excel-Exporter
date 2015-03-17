<?php namespace LaminSanneh\FlexiExcelExporter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateExportersTable extends Migration
{

    public function up()
    {
        Schema::create('laminsanneh_flexiexcelexporter_exporters', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('columns');
            $table->string('model');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laminsanneh_flexiexcelexporter_exporters');
    }

}
