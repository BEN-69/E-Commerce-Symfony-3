<?php

namespace Ben\PagesBundle\Controller;

use Ben\PagesBundle\Entity\Contact;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Page controller.
 *
 * @Route("contact")
 */
class ContactController extends Controller
{

    /**
     * Creates a new page entity.
     *
     * @Route("/send", name="pages_contact")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contact = new Contact();

        $utilisateur=$this->container->get('security.token_storage')->getToken()->getUser();



        if($utilisateur != 'anon.'){
            $contact->setName($utilisateur->getUsername());
            $contact->setEmail($utilisateur->getEmail());
        }




        $form = $this->createForm('Ben\PagesBundle\Form\ContactType', $contact);
        $form->handleRequest($request);




        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            // ici le mail de validation
            $message = Swift_Message::newInstance()
                ->setSubject('Contact via le site Fruits & Légumes')
                ->setFrom(array('r.benaata@gmail.com' => "Fruits & Légumes"))
                ->setTo('r.benaata@gmail.com')
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('@BenPages/SwiftLayout/validationContact.html.twig',array('contact' => $contact)));
            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->Add('success', 'Votre message viens d\'être transmis, Merci à vous !');

            return $this->redirectToRoute('pages_contact');
        }

        return $this->render('BenPagesBundle:Default:contact.html.twig',array(
            'contact'=>$contact,
            'form' => $form->createView(),
        ));
    }

}
