<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\User;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param ContactRepository $repo
     * @param UserInterface $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ContactRepository $repo, UserInterface $user)
    {
        // retrouve les contacts de l'utilisateur connecté
        $contacts = $repo->findByUser($user);
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
     * @param Request $request
     * @param ObjectManager $manager
     * @param UserInterface $user
     * @param Contact $contact
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(Request $request, ObjectManager $manager, UserInterface $user, Contact $contact = null)
    {
        // Si le contacte n'existe pas, alors c'est une création
        if (!$contact) {
            $contact = new Contact();
            $contact->setUser($user);
        }
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Si c'est un nouveau contact on rajoute la date de creéation
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
        // page d'affichage en détails d'un contact
        return $this->render('contact/show.html.twig', [
            'contact' => $contact
        ]);
    }
}
