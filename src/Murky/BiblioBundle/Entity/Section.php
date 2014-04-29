<?php

namespace Murky\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Murky\BiblioBundle\Entity\SectionRepository")
 */
class Section
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
     * @ORM\Column(name="section", type="string", length=255)
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity="Murky\UserBundle\Entity\User", inversedBy="sections")
     *
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="Murky\BiblioBundle\Entity\Biblio", mappedBy="section")
     *
     */
    protected $biblios;

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
     * Set section
     *
     * @param string $section
     * @return Section
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return string 
     */
    public function getSection()
    {
        return $this->section;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->biblios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \Murky\UserBundle\Entity\User $user
     * @return Section
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
     * Add biblios
     *
     * @param \Murky\BiblioBundle\Entity\Biblio $biblios
     * @return Section
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
}
