<?php

namespace Murky\BiblioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Murky\HomeBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Murky\BiblioBundle\Entity\Biblio;
use Murky\BiblioBundle\Form\BiblioType;

/**
 * Biblio controller.
 *
 * @Route("/biblio")
 */
class BiblioController extends Controller
{

    /**
     * Lists all Biblio entities.
     *
     * @Route("/", name="biblio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getEm();

        $entities = $em->getRepository('MurkyBiblioBundle:Biblio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Biblio entity.
     *
     * @Route("/", name="biblio_create")
     * @Method("POST")
     * @Template("MurkyBiblioBundle:Biblio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Biblio();
        $user = $this->getUser();
        $entity->setUser($user);

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getEm();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('biblio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Biblio entity.
    *
    * @param Biblio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Biblio $entity)
    {
        $form = $this->createForm(new BiblioType(), $entity, array(
            'action' => $this->generateUrl('biblio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Biblio entity.
     *
     * @Route("/new", name="biblio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Biblio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Biblio entity.
     *
     * @Route("/{id}", name="biblio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getEm();

        $entity = $em->getRepository('MurkyBiblioBundle:Biblio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biblio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Biblio entity.
     *
     * @Route("/{id}/edit", name="biblio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getEm();

        $entity = $em->getRepository('MurkyBiblioBundle:Biblio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biblio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Biblio entity.
    *
    * @param Biblio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Biblio $entity)
    {
        $form = $this->createForm(new BiblioType(), $entity, array(
            'action' => $this->generateUrl('biblio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Biblio entity.
     *
     * @Route("/{id}", name="biblio_update")
     * @Method("PUT")
     * @Template("MurkyBiblioBundle:Biblio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getEm();

        $entity = $em->getRepository('MurkyBiblioBundle:Biblio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biblio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('biblio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Biblio entity.
     *
     * @Route("/{id}", name="biblio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getEm();
            $entity = $em->getRepository('MurkyBiblioBundle:Biblio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Biblio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('biblio'));
    }

    /**
     * Creates a form to delete a Biblio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('biblio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
