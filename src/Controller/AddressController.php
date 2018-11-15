<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Contact;
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
    public function form(Request $request, ObjectManager $manager, ContactRepository $repository, $idContact, Address $address = null)
    {
        if (!$address){
            $address = new Address();
            $contact = $repository->find($idContact);
            $address->setContact($contact);
        }

        $form = $this->createForm(AddressType::class, $address);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            dump($request);
            $manager->persist($address);
            $manager->flush();

            return $this->redirectToRoute('contact_show', [
                'id' => $address->getContact()->getId()
            ]);
        }

        return $this->render('address/create.html.twig', [
            'addressForm' => $form->createView(),
            'editMode' => $address->getId() !== null
        ]);
    }
}
