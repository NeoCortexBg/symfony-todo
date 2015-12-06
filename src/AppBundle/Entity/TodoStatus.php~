<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="todo_status")
 */
class TodoStatus
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $todo_status_sid;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $name;

    /**
     * Get todoStatusSid
     *
     * @return integer
     */
    public function getTodoStatusSid()
    {
        return $this->todo_status_sid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TodoStatus
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
