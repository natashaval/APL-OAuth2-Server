<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 21:03
 */

namespace Domain\Exam\Entities;


class TestEntity
{
    private $id;
    private $name;
    private $description;
    private $beginTime;
    private $endTime;
    private $durationTime;
    private $resultToUser;
    private $reportToUser;
    private $scoreRight;
    private $scoreWrong;
    private $scoreUnanswered;
    private $scoreMax;
    private $scoreThreshold;
    private $password;
    private $enabled;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * @param mixed $beginTime
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getDurationTime()
    {
        return $this->durationTime;
    }

    /**
     * @param mixed $durationTime
     */
    public function setDurationTime($durationTime)
    {
        $this->durationTime = $durationTime;
    }

    /**
     * @return mixed
     */
    public function getResultToUser()
    {
        return $this->resultToUser;
    }

    /**
     * @param mixed $resultToUser
     */
    public function setResultToUser($resultToUser)
    {
        $this->resultToUser = $resultToUser;
    }

    /**
     * @return mixed
     */
    public function getReportToUser()
    {
        return $this->reportToUser;
    }

    /**
     * @param mixed $reportToUser
     */
    public function setReportToUser($reportToUser)
    {
        $this->reportToUser = $reportToUser;
    }

    /**
     * @return mixed
     */
    public function getScoreRight()
    {
        return $this->scoreRight;
    }

    /**
     * @param mixed $scoreRight
     */
    public function setScoreRight($scoreRight)
    {
        $this->scoreRight = $scoreRight;
    }

    /**
     * @return mixed
     */
    public function getScoreWrong()
    {
        return $this->scoreWrong;
    }

    /**
     * @param mixed $scoreWrong
     */
    public function setScoreWrong($scoreWrong)
    {
        $this->scoreWrong = $scoreWrong;
    }

    /**
     * @return mixed
     */
    public function getScoreUnanswered()
    {
        return $this->scoreUnanswered;
    }

    /**
     * @param mixed $scoreUnanswered
     */
    public function setScoreUnanswered($scoreUnanswered)
    {
        $this->scoreUnanswered = $scoreUnanswered;
    }

    /**
     * @return mixed
     */
    public function getScoreMax()
    {
        return $this->scoreMax;
    }

    /**
     * @param mixed $scoreMax
     */
    public function setScoreMax($scoreMax)
    {
        $this->scoreMax = $scoreMax;
    }

    /**
     * @return mixed
     */
    public function getScoreThreshold()
    {
        return $this->scoreThreshold;
    }

    /**
     * @param mixed $scoreThreshold
     */
    public function setScoreThreshold($scoreThreshold)
    {
        $this->scoreThreshold = $scoreThreshold;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }


}