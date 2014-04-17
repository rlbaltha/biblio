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
     * @ORM\Column(name="file_format", type="integer")
     */
    private $fileFormat;


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
}
