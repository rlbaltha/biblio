<?php

namespace Murky\BiblioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Murky\HomeBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Murky\BiblioBundle\Entity\Annotation;
use Murky\BiblioBundle\Form\AnnotationType;

/**
 * Annotation controller.
 *
 * @Route("/annotation")
 */
class AnnotationController extends Controller
{

    /**
     * Lists all Annotation entities.
     *
     * @Route("/", name="annotation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MurkyBiblioBundle:Annotation')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Annotation entity.
     *
     * @Route("/", name="annotation_create")
     * @Method("POST")
     * @Template("MurkyBiblioBundle:Annotation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Annotation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('annotation_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Annotation entity.
    *
    * @param Annotation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Annotation $entity)
    {
        $form = $this->createForm(new AnnotationType(), $entity, array(
            'action' => $this->generateUrl('annotation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Annotation entity.
     *
     * @Route("/{biblioid}/new", name="annotation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($biblioid)
    {
        $em= $this->getEm();
        $biblio = $em->getRepository('MurkyBiblioBundle:Biblio')->find($biblioid);
        $entity = new Annotation();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Annotation entity.
     *
     * @Route("/{id}", name="annotation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MurkyBiblioBundle:Annotation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annotation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Annotation entity.
     *
     * @Route("/{id}/edit", name="annotation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MurkyBiblioBundle:Annotation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annotation entity.');
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
    * Creates a form to edit a Annotation entity.
    *
    * @param Annotation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Annotation $entity)
    {
        $form = $this->createForm(new AnnotationType(), $entity, array(
            'action' => $this->generateUrl('annotation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Annotation entity.
     *
     * @Route("/{id}", name="annotation_update")
     * @Method("PUT")
     * @Template("MurkyBiblioBundle:Annotation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MurkyBiblioBundle:Annotation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annotation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('annotation_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Annotation entity.
     *
     * @Route("/{id}", name="annotation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MurkyBiblioBundle:Annotation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Annotation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('annotation'));
    }

    /**
     * Creates a form to delete a Annotation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('annotation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
