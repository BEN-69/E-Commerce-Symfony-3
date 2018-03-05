<?php

namespace Ben\PagesBundle\Controller;

use Ben\PagesBundle\Entity\Pages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Page controller.
 *
 * @Route("admin/pages")
 */
class PagesAdminController extends Controller
{
    /**
     * Lists all page entities.
     *
     * @Route("/", name="admin_pages_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pages = $em->getRepository('BenPagesBundle:Pages')->findAll();

        return $this->render('BenPagesBundle:PagesAdmin:index.html.twig', array(
            'pages' => $pages,
        ));
    }

    /**
     * Creates a new page entity.
     *
     * @Route("/new", name="admin_pages_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $page = new Pages();
        $form = $this->createForm('Ben\PagesBundle\Form\PagesType', $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);
            $em->flush();

            return $this->redirectToRoute('admin_pages_show', array('id' => $page->getId()));
        }

        return $this->render('BenPagesBundle:PagesAdmin:new.html.twig', array(
            'page' => $page,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a page entity.
     *
     * @Route("/{id}", name="admin_pages_show")
     * @Method("GET")
     */
    public function showAction(Pages $page)
    {
        $deleteForm = $this->createDeleteForm($page);

        return $this->render('BenPagesBundle:PagesAdmin:show.html.twig', array(
            'page' => $page,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing page entity.
     *
     * @Route("/{id}/edit", name="admin_pages_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pages $page)
    {
        $deleteForm = $this->createDeleteForm($page);
        $editForm = $this->createForm('Ben\PagesBundle\Form\PagesType', $page);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_pages_edit', array('id' => $page->getId()));
        }

        return $this->render('BenPagesBundle:PagesAdmin:edit.html.twig', array(
            'page' => $page,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a page entity.
     *
     * @Route("/{id}", name="admin_pages_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pages $page)
    {
        $form = $this->createDeleteForm($page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($page);
            $em->flush();
        }

        return $this->redirectToRoute('admin_pages_index');
    }

    /**
     * Creates a form to delete a page entity.
     *
     * @param Pages $page The page entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pages $page)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_pages_delete', array('id' => $page->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
