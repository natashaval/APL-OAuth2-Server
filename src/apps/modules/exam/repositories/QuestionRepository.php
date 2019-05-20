<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 13:31
 */

namespace App\Exam\Repositories;


use Domain\Exam\Entities\QuestionEntity;
use Domain\Exam\Repositories\QuestionRepositoryInterface;
use Phalcon\Db\Column;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $conn = $this->getConnection();
        $questions = $conn->fetchAll("SELECT * FROM questions WHERE enabled = TRUE");
        return $questions;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $conn = $this->getConnection();
        $question = $conn->fetchOne("SELECT * FROM questions WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [ "id" => $id],
            [ "id" => Column::BIND_PARAM_INT]
        );
        return $question;
    }

    public function createQuestion(QuestionEntity $question)
    {
        // TODO: Implement createQuestion() method.
        $conn = $this->getConnection();
        $newQuestion = $conn->insert (
            "questions",
            [
                $question->getSubject(),
                $question->getDescription(),
                $question->getExplanation(),
                $question->getType(),
                $question->getDifficulty(),
                $question->getPosition(),
                $question->getTimer()
            ],
            ["subject_id", "description", "explanation",
                "type", "difficulty", "position", "timer"]
        );
        return $newQuestion;
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
        $conn = $this->getConnection();
        $count = $conn->fetchOne("SELECT COUNT(id) AS total FROM answers WHERE question_id = :question_id",
            Db::FETCH_ASSOC,
            [ "question_id" => $id ],
            [ "question_id" => Column::BIND_PARAM_INT]
        );

        if ($count["total"] > 0) return false; // check if there is foreign key in other table

        else {
            $stmt = $conn->prepare("UPDATE `question` SET enabled = FALSE WHERE id = :id");
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