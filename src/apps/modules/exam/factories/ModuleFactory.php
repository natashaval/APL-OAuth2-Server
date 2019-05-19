<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 21:38
 */
namespace App\Exam\Factories;

use Domain\Exam\Entities\ModuleEntity;

class ModuleFactory
{
    public static function create(){
        $module = new ModuleEntity();
        $module->setEnabled(1);
        return $module;
    }
}