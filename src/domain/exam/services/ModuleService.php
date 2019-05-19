<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 20:33
 */

namespace Domain\Exam\Services;

use Domain\Exam\Entities\ModuleEntity;
use Domain\Exam\Repositories\ModuleRepositoryInterface;

class ModuleService
{
    private $moduleRepository;
    /**
     * ModuleService constructor.
     */
    public function __construct(ModuleRepositoryInterface $repository){
     $this->moduleRepository = $repository;
    }

    public function getAll(){
        $modules = $this->moduleRepository->getAll();
        return $modules;
    }

    public function getById($id) {
        $module = $this->moduleRepository->getById($id);
        return $module;
    }

    public function createModule(ModuleEntity $module){
        $newModule = $this->moduleRepository->createModule($module);
        return $newModule;
    }

    public function deleteById($id) {
        $result = $this->moduleRepository->deleteById($id);
        return $result;
    }
}