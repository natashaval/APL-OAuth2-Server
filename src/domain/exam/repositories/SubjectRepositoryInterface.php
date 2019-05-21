<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 20:29
 */

namespace Domain\Exam\Repositories;

use Domain\Exam\Entities\SubjectEntity;

interface SubjectRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createSubject(SubjectEntity $subject);
    public function updateSubject($id, SubjectEntity $subject);

    public function getAllSubjectByModuleId($id);
}