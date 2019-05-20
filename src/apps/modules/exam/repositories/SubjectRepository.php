<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 22:27
 */

namespace App\Exam\Repositories;


use Domain\Exam\Entities\SubjectEntity;
use Domain\Exam\Repositories\SubjectRepositoryInterface;
use Phalcon\Db\Column;
use Phalcon\Db\Result\Pdo;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $conn = $this->getConnection();
        $modules = $conn->fetchAll("SELECT * FROM subjects WHERE enabled = TRUE");
        return $modules;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $conn = $this->getConnection();
        $subject = $conn->fetchOne("SELECT * FROM subjects WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [ "id" => $id],
            [ "id" => Column::BIND_PARAM_INT]
        );
        return $subject;
    }

    public function createSubject(SubjectEntity $subject)
    {
        // TODO: Implement createSubject() method.
        $conn = $this->getConnection();
        $newSubject = $conn->insert (
            "subjects",
            [
                $subject->getModule(),
                $subject->getName(),
                $subject->getDescription()
            ],
            ["module_id", "name", "description"]
        );
        return $newSubject;
    }

    public function updateSubject($id, SubjectEntity $subject)
    {
        // TODO: Implement updateSubject() method.
        $conn = $this->getConnection();
        $updateSubject = $conn->update(
            "subjects",
            ["module_id", "name", "description"], //fields
            [ // values
                $subject->getModule(),
                $subject->getName(),
                $subject->getDescription()
            ],
            [
                "conditions" => "id = ?",
                "bind" => [$id]
            ]
        );
        return $updateSubject;
    }
}