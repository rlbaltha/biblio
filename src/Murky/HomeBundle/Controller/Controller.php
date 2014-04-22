<?php

namespace Murky\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;
use Doctrine\ORM\EntityManager;

class Controller extends SymfonyController
{

    /**
     *
     * @return \Murky\UserBundle\Entity\User
     */
    public function getUser() {
        $user = $this->get('security.context')->getToken()->getUser();
        return $user;
    }

    /**
     *
     * @return EntityManager
     */
    public function getEm() {
        $em = $this->getDoctrine()->getManager();
        return $em;
    }



}