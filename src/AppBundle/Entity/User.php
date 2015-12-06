<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 * @ORM\Table(name="`user`")
 * @UniqueEntity("email")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $user_sid;

    /**
     * @ORM\Column(type="string", length=256)
	 *
	 * @Assert\NotBlank()
	 * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=100)
	 *
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 6,
	 *      max = 30
	 * )
     */
    protected $password;

    /**
     */
    protected $confirm_password;

    /**
     * Get userSid
     *
     * @return integer
     */
    public function getUserSid()
    {
        return $this->user_sid;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setConfirmPassword($confirm_password)
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }

    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }

    /**
     * @Assert\True(message = "The password and confirmation password do not match")
     */
    public function isPasswordEqualToConfirmPassword()
    {
        return $this->password === $this->confirm_password;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

//    public function getPassword()
//    {
//        return $this->password;
//    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->user_sid,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->user_sid,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
}
