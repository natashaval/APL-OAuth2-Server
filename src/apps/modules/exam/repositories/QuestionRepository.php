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
}