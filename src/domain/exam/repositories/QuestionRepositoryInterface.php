<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 13:28
 */

namespace Domain\Exam\Repositories;


use Domain\Exam\Entities\QuestionEntity;

interface QuestionRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createQuestion(QuestionEntity $question);
}