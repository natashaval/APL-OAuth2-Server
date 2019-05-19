<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 20:29
 */

namespace Domain\Exam\Repositories;

use Domain\Exam\Entities\ModuleEntity;

interface ModuleRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createModule(ModuleEntity $module);
    public function deleteById($id);
}