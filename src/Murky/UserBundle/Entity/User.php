<?php

namespace Murky\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="murky_user")
 * @ORM\Entity(repositoryClass="Murky\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;


    /**
     * @ORM\OneToMany(targetEntity="Murky\BiblioBundle\Entity\Biblio", mappedBy="user")
     *
     */
    protected $biblios;


    /**
     * @ORM\OneToMany(targetEntity="Murky\BiblioBundle\Entity\Annotation", mappedBy="user")
     *
     */
    protected $annotations;

    /**
     * @ORM\OneToMany(targetEntity="Murky\BiblioBundle\Entity\Tag", mappedBy="user")
     *
     */
    protected $tags;

    /**
     * @ORM\OneToMany(targetEntity="Murky\BiblioBundle\Entity\Author", mappedBy="user")
     *
     */
    protected $authors;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->biblios = new \Doctrine\Common\Collections\ArrayCollection();
        $this->annotations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add biblios
     *
     * @param \Murky\BiblioBundle\Entity\Biblio $biblios
     * @return User
     */
    public function addBiblio(\Murky\BiblioBundle\Entity\Biblio $biblios)
    {
        $this->biblios[] = $biblios;

        return $this;
    }

    /**
     * Remove biblios
     *
     * @param \Murky\BiblioBundle\Entity\Biblio $biblios
     */
    public function removeBiblio(\Murky\BiblioBundle\Entity\Biblio $biblios)
    {
        $this->biblios->removeElement($biblios);
    }

    /**
     * Get biblios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBiblios()
    {
        return $this->biblios;
    }

    /**
     * Add annotations
     *
     * @param \Murky\BiblioBundle\Entity\Annotation $annotations
     * @return User
     */
    public function addAnnotation(\Murky\BiblioBundle\Entity\Annotation $annotations)
    {
        $this->annotations[] = $annotations;

        return $this;
    }

    /**
     * Remove annotations
     *
     * @param \Murky\BiblioBundle\Entity\Annotation $annotations
     */
    public function removeAnnotation(\Murky\BiblioBundle\Entity\Annotation $annotations)
    {
        $this->annotations->removeElement($annotations);
    }

    /**
     * Get annotations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnotations()
    {
        return $this->annotations;
    }

    /**
     * Add tags
     *
     * @param \Murky\BiblioBundle\Entity\Tag $tags
     * @return User
     */
    public function addTag(\Murky\BiblioBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Murky\BiblioBundle\Entity\Tag $tags
     */
    public function removeTag(\Murky\BiblioBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add authors
     *
     * @param \Murky\BiblioBundle\Entity\Author $authors
     * @return User
     */
    public function addAuthor(\Murky\BiblioBundle\Entity\Author $authors)
    {
        $this->authors[] = $authors;

        return $this;
    }

    /**
     * Remove authors
     *
     * @param \Murky\BiblioBundle\Entity\Author $authors
     */
    public function removeAuthor(\Murky\BiblioBundle\Entity\Author $authors)
    {
        $this->authors->removeElement($authors);
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}
