<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 15:41
 */

namespace Domain\Exam\Services;


use Domain\Exam\Entities\AnswerEntity;
use Domain\Exam\Repositories\AnswerRepositoryInterface;
use Domain\Exam\Repositories\QuestionRepositoryInterface;

class AnswerService
{
    private $answerRepository;
    private $questionRepository;

    /**
     * AnswerService constructor.
     * @param $answerRepository
     * @param $questionRepository
     */
    public function __construct(AnswerRepositoryInterface $answerRepository, QuestionRepositoryInterface $questionRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
    }

    public function getAll(){
        $answers = [];
        $answersQ = $this->answerRepository->getAll();
        foreach ($answersQ as $answerQ) {
            $questionQ = $this->questionRepository->getById($answerQ["question_id"]);
            $answerQ['question'] = $questionQ;
            array_push($answers, $answerQ);
        }
        return $answers;
    }

    public function getById($id) {
        $answerQ = $this->answerRepository->getById($id);
        if(!$answerQ) return false;
        else {
            $questionQ = $this->questionRepository->getById($answerQ["question_id"]);
            $answerQ['question'] = $questionQ;
            return $answerQ;
        }
    }
    public function createAnswer(AnswerEntity $answer){
        $newAnswer = $this->answerRepository->createAnswer($answer);
        return $newAnswer;
    }
    public function updateAnswer($id, AnswerEntity $answer){
        $updateAnswer = $this->answerRepository->updateAnswer($id, $answer);
        return $updateAnswer;
    }
    public function deleteById($id){
        $exist = $this->answerRepository->getById($id);
        if(!$exist) return false;

        $result = $this->answerRepository->deleteById($id);
        return $result;
    }

}