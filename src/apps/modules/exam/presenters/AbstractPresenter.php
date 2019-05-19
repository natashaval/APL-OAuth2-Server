<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 00:59
 */

namespace App\Exam\Presenters;


abstract class AbstractPresenter
{
    abstract public function convertCreate($data, $entity);
}