<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/show/{id}", name="contact_show")
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
