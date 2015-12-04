<?php

namespace AA\PlatformBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AA\PlatformBundle\Entity\Advert;
use AA\PlatformBundle\Form\AdvertType;

// use Symfony\component\HttpFoundation\JsonResponse;


class AdvertRestController extends Controller
{
    public function getAdvertsAction()
    {
       $adverts = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Advert")
            ->findAll();

        return $adverts;
    }

    public function getAdvertAction($id)
    {
       $advert = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Advert")
            ->find($id);

        return $advert;
    }

    public function postAdvertAction(Request $request)
    {
        

        $advert = new Advert();
        $form = $this->createForm(new AdvertType(), $advert);
        $form->bind($request);
        

        return $form;


        /*$entity = $this->getDoctrine()->getManager();

        $advert = new Advert();
        $advert->setTitre("Mercedes classe c garantie 2017")
            ->setDescription("suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu'en 2017 par Mercedes . la révision vient d'être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres \100,elle dispose d 'un grand réservoir de 66 litres(plus de 1000 kilomètres d'autonomie).de l'active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement")
            ->setUrl("http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg")
            ->setDate(new \DateTime());

        $entity->persist($advert);
        $entity->flush();

        return $this->redirectView(
                $this->generateUrl(
                    'get_advert',
                    array('id' => $entity->getId())
                    ),
                Codes::HTTP_CREATED
                );*/
    }


}


/*
{
      "id":1,
      "titre":"Mercedes classe c garantie 2017",
      "description":"test test test",
      "url":"a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg",
      "date":"2015-10-14 15:02:08",
      "status":null
}
*/