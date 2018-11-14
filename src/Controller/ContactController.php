<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param ContactRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ContactRepository $repo)
    {
        $contacts = $repo->findAll();
        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts
        ]);
    }

    /**
     * @Route("/", name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function home()
    {
        return $this->render('contact/home.html.twig');
    }

    /**
     * @Route("/contact/new", name="contact_create")
     * @Route("/contact/{id}/edit", name="contact_edit")
     * @param Contact $contact
     * @param Request $request
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(Request $request, ObjectManager $manager, Contact $contact = null)
    {
        if (!$contact) {
            $contact = new Contact();
        }
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$contact->getId()) {
                $contact->setCreatedAt(new \DateTime());
            }
            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('contact_show', ['id' => $contact->getId()]);
        }

        return $this->render('contact/create.html.twig', [
            'formContact' => $form->createView(),
            'editMode' => $contact->getId() !== null
        ]);
    }

    /**
     * @Route("/contact/{id}", name="contact_show")
     * @param Contact $contact
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Contact $contact)
    {
        return $this->render('contact/show.html.twig', [
            'contact' => $contact
        ]);
    }
}
