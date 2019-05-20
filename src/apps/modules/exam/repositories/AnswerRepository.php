<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 15:41
 */

namespace App\Exam\Repositories;

use Domain\Exam\Entities\AnswerEntity;
use Domain\Exam\Repositories\AnswerRepositoryInterface;
use Phalcon\Db\Column;

class AnswerRepository extends BaseRepository implements AnswerRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $conn = $this->getConnection();
        $answers = $conn->fetchAll("SELECT * FROM answers WHERE enabled = TRUE");
        return $answers;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $conn = $this->getConnection();
        $answer = $conn->fetchOne("SELECT * FROM answers WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [ "id" => $id],
            [ "id" => Column::BIND_PARAM_INT]
        );
        return $answer;
    }

    public function createAnswer(AnswerEntity $answer)
    {
        // TODO: Implement createAnswer() method.
        $conn = $this->getConnection();
        $newAnswer = $conn->insert (
            "answers",
            [
                $answer->getQuestion(),
                $answer->getDescription(),
                $answer->getExplanation(),
                $answer->getisRight(),
                $answer->getPosition()
            ],
            ["question_id", "description", "explanation",
                "is_right", "position"]
        );
        return $newAnswer;
    }

    public function updateAnswer($id, AnswerEntity $answer)
    {
        // TODO: Implement updateAnswer() method.
        $conn = $this->getConnection();
        $updateAnswer = $conn->update(
            "answers",
            ["question_id", "description", "explanation",
                "is_right", "position"], //fields
            [ // values
                $answer->getQuestion(),
                $answer->getDescription(),
                $answer->getExplanation(),
                $answer->getisRight(),
                $answer->getPosition()
            ],
            [
                "conditions" => "id = ?",
                "bind" => [$id]
            ]
        );
        return $updateAnswer;
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
        $conn = $this->getConnection();

        $stmt = $conn->prepare("UPDATE `answers` SET enabled = FALSE WHERE id = :id");
        $result = $conn->executePrepared(
            $stmt,
            ["id" => $id],
            ["id" => Column::BIND_PARAM_INT]
        );

        if($result) return true;
        else return false;
    }
}