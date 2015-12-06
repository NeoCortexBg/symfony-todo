<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="todo")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TodoRepository")
 */
class Todo
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $todo_sid;

    /**
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @ORM\Column(type="integer", nullable = true)
     */
	protected $project_sid;

    /**
     * @ORM\Column(type="integer")
     */
	protected $todo_status_sid;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $priority;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_created;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     */
    protected $date_updated;

    /**
     * @ManyToOne(targetEntity="Project")
     * @JoinColumn(name="project_sid", referencedColumnName="project_sid")
     */
    private $project;

    /**
     * @ManyToOne(targetEntity="TodoStatus")
     * @JoinColumn(name="todo_status_sid", referencedColumnName="todo_status_sid")
     */
    private $todo_status;

    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->date_created = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->date_updated = new \DateTime("now");
    }

    /**
     * Get todoSid
     *
     * @return integer
     */
    public function getTodoSid()
    {
        return $this->todo_sid;
    }

    public function setTodoSid($todo_sid)
    {
        $this->todo_sid = $todo_sid;

		return $this;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Todo
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set projectSid
     *
     * @param integer $projectSid
     *
     * @return Todo
     */
    public function setProjectSid($projectSid)
    {
        $this->project_sid = $projectSid;

        return $this;
    }

    /**
     * Get projectSid
     *
     * @return integer
     */
    public function getProjectSid()
    {
        return $this->project_sid;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Todo
     */
    public function setPriority($priority)
    {
        $this->priority = (int)$priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Todo
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     *
     * @return Todo
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->date_updated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return Todo
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set todoStatus
     *
     * @param \AppBundle\Entity\TodoStatus $todoStatus
     *
     * @return Todo
     */
    public function setTodoStatus(\AppBundle\Entity\TodoStatus $todoStatus = null)
    {
        $this->todo_status = $todoStatus;

        return $this;
    }

    /**
     * Get todoStatus
     *
     * @return \AppBundle\Entity\TodoStatus
     */
    public function getTodoStatus()
    {
        return $this->todo_status;
    }

    /**
     * Set todoStatusSid
     *
     * @param integer $todoStatusSid
     *
     * @return Todo
     */
    public function setTodoStatusSid($todoStatusSid)
    {
        $this->todo_status_sid = $todoStatusSid;

        return $this;
    }

    /**
     * Get todoStatusSid
     *
     * @return integer
     */
    public function getTodoStatusSid()
    {
        return $this->todo_status_sid;
    }
}
