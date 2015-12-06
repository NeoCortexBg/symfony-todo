<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 */
class Project
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $project_sid;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;


    /**
     * Get projectSid
     *
     * @return integer
     */
    public function getProjectSid()
    {
        return $this->project_sid;
    }

    public function setProjectSid($id)
    {
        $this->project_sid = $id;

		return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Project
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
