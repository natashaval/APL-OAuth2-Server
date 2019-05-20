<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 15:41
 */

namespace Domain\Exam\Repositories;


use Domain\Exam\Entities\AnswerEntity;

interface AnswerRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createAnswer(AnswerEntity $answer);
    public function updateAnswer($id, AnswerEntity $answer);
    public function deleteById($id);
}