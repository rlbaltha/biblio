<?php

namespace Murky\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Biblio
 *
 * @ORM\Table(name="biblio")
 * @ORM\Entity(repositoryClass="Murky\BiblioBundle\Entity\BiblioRepository")
 */
class Biblio
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="pub_info", type="text")
     */
    private $pubInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="file_format", type="integer", nullable=true)
     */
    private $fileFormat;

    /**
     * @ORM\ManyToOne(targetEntity="Murky\UserBundle\Entity\User", inversedBy="biblios")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Murky\BiblioBundle\Entity\Section", inversedBy="biblios")
     *
     */
    protected $section;

    /**
     * @ORM\OneToMany(targetEntity="Murky\BiblioBundle\Entity\Annotation", mappedBy="biblio")
     *
     */
    protected $annotations;

    /**
     * @ORM\ManyToMany(targetEntity="Murky\BiblioBundle\Entity\Tag")
     */
    protected $tags;

    /**
     * @ORM\ManyToMany(targetEntity="Murky\BiblioBundle\Entity\Author")
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
     * Set title
     *
     * @param string $title
     * @return Biblio
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set pubInfo
     *
     * @param string $pubInfo
     * @return Biblio
     */
    public function setPubInfo($pubInfo)
    {
        $this->pubInfo = $pubInfo;

        return $this;
    }

    /**
     * Get pubInfo
     *
     * @return string 
     */
    public function getPubInfo()
    {
        return $this->pubInfo;
    }

    /**
     * Set fileFormat
     *
     * @param integer $fileFormat
     * @return Biblio
     */
    public function setFileFormat($fileFormat)
    {
        $this->fileFormat = $fileFormat;

        return $this;
    }

    /**
     * Get fileFormat
     *
     * @return integer 
     */
    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    /**
     * Set user
     *
     * @param \Murky\UserBundle\Entity\User $user
     * @return Biblio
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
     * Constructor
     */
    public function __construct()
    {
        $this->annotations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add annotations
     *
     * @param \Murky\BiblioBundle\Entity\Annotation $annotations
     * @return Biblio
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
     * @return Biblio
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
     * @return Biblio
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

    /**
     * Set section
     *
     * @param \Murky\BiblioBundle\Entity\Section $section
     * @return Biblio
     */
    public function setSection(\Murky\BiblioBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \Murky\BiblioBundle\Entity\Section 
     */
    public function getSection()
    {
        return $this->section;
    }
}
