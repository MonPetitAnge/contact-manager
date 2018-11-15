<?php

namespace App\Controller;

use App\Entity\Address;
use App\Form\AddressType;
use App\Repository\ContactRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddressController extends AbstractController
{
    /**
     * @Route("/address", name="address")
     */
    public function index()
    {
        return $this->render('address/index.html.twig', [
            'controller_name' => 'AddressController',
        ]);
    }

    /**
     * @Route("/address/add/{idContact}", name="address_create")
     * @Route("/address/{id}/edit", name="address_edit")
     * @param Request $request
     * @param ObjectManager $manager
     * @param ContactRepository $repository
     * @param $idContact
     * @param Address|null $address
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(Request $request, ObjectManager $manager, ContactRepository $repository, $idContact = null, Address $address = null)
    {
        // Si l'addresse n'existe pas c'est un ajout
        // On cherche aussi le contact équivalent
        if (!$address) {
            $address = new Address();
            $contact = $repository->find($idContact);
            $address->setContact($contact);
        }

        $form = $this->createForm(AddressType::class, $address);

        $form->handleRequest($request);

        // Si le formulaire est soumit on vérifie les valeurs et on rajoute les addresses
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($address);
            $manager->flush();

            // Redirection vers la page qui détaille le contact
            return $this->redirectToRoute('contact_show', [
                'id' => $address->getContact()->getId()
            ]);
        }

        // Redirection vers le formulaire de création
        return $this->render('address/create.html.twig', [
            'addressForm' => $form->createView(),
            'editMode' => $address->getId() !== null
        ]);
    }
}
