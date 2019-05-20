<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 13:37
 */

namespace Domain\Exam\Services;


use Domain\Exam\Entities\QuestionEntity;
use Domain\Exam\Repositories\QuestionRepositoryInterface;
use Domain\Exam\Repositories\SubjectRepositoryInterface;

class QuestionService
{
    private $questionRepository;
    private $subjectRepository;

    /**
     * QuestionService constructor.
     * @param $questionRepository
     * @param $subjectRepository
     */
    public function __construct(QuestionRepositoryInterface $questionRepository, SubjectRepositoryInterface $subjectRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->subjectRepository = $subjectRepository;
    }


    public function getAll(){
        $questions = [];
        $questionsQ = $this->questionRepository->getAll();
        foreach ($questionsQ as $questionQ){
            $subjectQ = $this->subjectRepository->getById($questionQ["subject_id"]);
            $questionQ['subject'] = $subjectQ;
            array_push($questions, $questionQ);
        }
        return $questions;
    }

    public function getById($id){
        $questionQ = $this->questionRepository->getById($id);
        if(!$questionQ) return false;
        else {
            $subjectQ = $this->subjectRepository->getById($questionQ["subject_id"]);
            $questionQ['subject'] = $subjectQ;
            return $questionQ;
        }
    }

    public function createQuestion(QuestionEntity $question){
        $newQuestion = $this->questionRepository->createQuestion($question);
        return $newQuestion;
    }
}