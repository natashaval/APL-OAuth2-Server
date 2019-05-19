<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 23:25
 */
namespace Domain\Exam\Mappers;

use Domain\Exam\Entities\ModuleEntity;
use Domain\Exam\Entities\SubjectEntity;

class SubjectMapper
{
    public static function mapToSubjectEntity($subjectData, $moduleData) {
        $subject = new SubjectEntity();
        $subject->setId($subjectData["id"]);
        $subject->setName($subjectData["name"]);
        $subject->setDescription($subjectData["description"]);
        $subject->setEnabled($subjectData["enabled"]);
//        $subject->setModule(new ModuleEntity());
/*
        $module = new ModuleEntity();
        $module->setId($moduleData["id"]);
        $module->setName($moduleData["name"]);
        $module->setEnabled($moduleData["enabled"]);

//        $subject->setModule()->setName($moduleData["name"]);

        $subject->setModule($module);
*/
        $subject->setModule($moduleData);
        return $subject;
    }

    public static function appendModuleToSubjectEntity($subjectData, $moduleData){
        $subjectData['module'] = $moduleData;
        return $subjectData;
    }
}