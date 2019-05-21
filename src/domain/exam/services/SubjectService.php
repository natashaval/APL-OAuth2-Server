<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 20:33
 */

namespace Domain\Exam\Services;

use Domain\Exam\Entities\SubjectEntity;
use Domain\Exam\Mappers\SubjectMapper;
use Domain\Exam\Repositories\ModuleRepositoryInterface;
use Domain\Exam\Repositories\SubjectRepositoryInterface;

class SubjectService
{
    private $subjectRepository;
    private $moduleRepository;

    /**
     * SubjectService constructor.
     * @param $subjectRepository
     * @param $moduleRepository
     */
    public function __construct(
        SubjectRepositoryInterface $subjectRepository,
        ModuleRepositoryInterface $moduleRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->moduleRepository = $moduleRepository;
    }

    public function getAll() {
        $subjects = [];

        $subjectsQ = $this->subjectRepository->getAll();
        foreach ($subjectsQ as $subjectQ) {
            $moduleQ = $this->moduleRepository->getById($subjectQ["module_id"]);
            $subjectQ['module'] = $moduleQ;
            array_push($subjects, $subjectQ);
        }
//        return $subjectsQ;
        return $subjects;
    }

    public function getById($id) {
//        https://stackoverflow.com/questions/15810257/create-nested-json-object-in-php

        $subjectQ = $this->subjectRepository->getById($id);
        if (!$subjectQ) return false;

        $moduleQ = $this->moduleRepository->getById($subjectQ["module_id"]);
////
//        $subject = SubjectMapper::mapToSubjectEntity($subjectQ, $moduleQ);
//        return $subject;

        $subject = SubjectMapper::appendModuleToSubjectEntity($subjectQ, $moduleQ);
        return $subject;
    }

    public function createSubject(SubjectEntity $subject) {
        $newSubject = $this->subjectRepository->createSubject($subject);
        return $newSubject;
    }

    public function updateSubject($id, SubjectEntity $subject) {
        $exist = $this->subjectRepository->getById($id);
        if(!$exist) return false;
        else {
            $updateSubject = $this->subjectRepository->updateSubject($id, $subject);
            return $updateSubject;
        }
    }

    public function getAllSubjectByModuleId($id){
        $subjects = $this->subjectRepository->getAllSubjectByModuleId($id);
        return $subjects;
    }

}