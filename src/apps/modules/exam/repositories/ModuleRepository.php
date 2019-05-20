<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 20:40
 */

namespace App\Exam\Repositories;

use Domain\Exam\Entities\ModuleEntity;
use Domain\Exam\Repositories\ModuleRepositoryInterface;
use Phalcon\Db;
use Phalcon\Db\Column;

class ModuleRepository extends BaseRepository implements ModuleRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $conn = $this->getConnection();
        $modules = $conn->fetchAll("SELECT * FROM modules WHERE enabled = TRUE");
        return $modules;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $conn = $this->getConnection();
        $module = $conn->fetchOne("SELECT * FROM modules WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [ "id" => $id],
            [ "id" => Column::BIND_PARAM_INT]
            );
        return $module;
    }

    public function createModule(ModuleEntity $module)
    {
        // TODO: Implement createModule() method.
        $conn = $this->getConnection();
        $newModule = $conn->insert (
            "modules",
            [$module->getName()],
            ["name"]
        );
        return $newModule;
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
        $conn = $this->getConnection();
        $count = $conn->fetchOne("SELECT COUNT(id) AS total FROM subjects WHERE module_id = :module_id",
            Db::FETCH_ASSOC,
            [ "module_id" => $id ],
            [ "module_id" => Column::BIND_PARAM_INT]
            );
//        return $count["total"];

        if ($count["total"] > 0) return false; // check if there is foreign key in other table

        else {
            $stmt = $conn->prepare("UPDATE `modules` SET enabled = FALSE WHERE id = :id");
            $result = $conn->executePrepared(
                $stmt,
                ["id" => $id],
                ["id" => Column::BIND_PARAM_INT]
            );

            if($result) return true;
            else return false;
        }

        return false;


    }
}