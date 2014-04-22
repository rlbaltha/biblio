<?php

namespace Murky\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annotation
 *
 * @ORM\Table(name="annotation")
 * @ORM\Entity(repositoryClass="Murky\BiblioBundle\Entity\AnnotationRepository")
 */
class Annotation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="annotation", type="text")
     */
    private $annotation;

    /**
     * @ORM\ManyToOne(targetEntity="Murky\UserBundle\Entity\User", inversedBy="annotations")
     *
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Murky\BiblioBundle\Entity\Biblio", inversedBy="annotations")
     *
     */
    protected $biblio;


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
     * Set annotation
     *
     * @param string $annotation
     * @return Annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;

        return $this;
    }

    /**
     * Get annotation
     *
     * @return string 
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * Set user
     *
     * @param \Murky\UserBundle\Entity\User $user
     * @return Annotation
     */
    public function setUser(\Murky\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Murky\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set biblio
     *
     * @param \Murky\BiblioBundle\Entity\Biblio $biblio
     * @return Annotation
     */
    public function setBiblio(\Murky\BiblioBundle\Entity\Biblio $biblio = null)
    {
        $this->biblio = $biblio;

        return $this;
    }

    /**
     * Get biblio
     *
     * @return \Murky\BiblioBundle\Entity\Biblio 
     */
    public function getBiblio()
    {
        return $this->biblio;
    }
}
