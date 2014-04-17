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
}
