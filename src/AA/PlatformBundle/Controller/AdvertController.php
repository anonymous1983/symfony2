<?php

namespace AA\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AA\PlatformBundle\Entity\Advert;

// use Symfony\component\HttpFoundation\JsonResponse;


class AdvertController extends Controller
{
    public function indexAction()
    {
        $content = $this
            ->get('templating')
            ->render('AAPlatformBundle:Advert:index.html.twig', array(
                    'nom' => 'winzou'
                )
            );
        return new Response($content);
    }

    public function viewAction($id, Request $request)
    {
        // On veut avoir l'url de l'annonce de l'id 5
        /*
         * Méthode longue
         * $url = $this->get('router')->generate(
            'aa_platform_view',
            array('id' => $id),
            true
        );*/

        // Méthode courte
        $url = $this->generateUrl(
            'aa_platform_view',
            array('id' => $id),
            true
        );

        $query = $request->query->all();
        $tag = $request->query->get('tag');

        /*
         * Méthode longue
         * $content = $this
            ->get('templating')
            ->render(
                'AAPlatformBundle:Advert:view.html.twig', array(
                    'id' => $id,
                    'url' => $url
                )
            );*/

        $content = $this
            ->renderView(
                'AAPlatformBundle:Advert:view.html.twig', array(
                    'id' => $id,
                    'url' => $url,
                    'tag' => $tag,
                    'query' => $query
                )
            );

        /*
         * Changer le Content-type de la réponse
         * $response = new Response(
            json_encode(
                array('content' => $content)
            )
        );
        $response->headers->set('Content-type', 'application/json');
        */

        /*
         * Use JsonResponse
         * return new JsonResponse(array('content' => $content));
         */

        $response = new Response($content);
        return $response;
    }

    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '" . $slug . "', créée en " . $year . " et au format " . $_format . "."
        );
    }

    public function allAction()
    {
        //$entity = $this->getDoctrine()->getManager();
        $adverts = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Advert")
            ->findAll();
        $content = $this->renderView("AAPlatformBundle:Advert:all.html.twig", array(
                'adverts' => $adverts
            )
        );

        return new Response($content);
    }

    public function addAction(Request $request)
    {

        if ($request->isMethod('POST')) {
            $entity = $this->getDoctrine()->getManager();

            $advert = new Advert();
            $advert->setTitre("Mercedes classe c garantie 2017")
                ->setDescription("suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu'en 2017 par Mercedes . la révision vient d'être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres \100,elle dispose d 'un grand réservoir de 66 litres(plus de 1000 kilomètres d'autonomie).de l'active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement")
                ->setUrl("http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg")
                ->setDate(new \DateTime());

            $entity->persist($advert);
            $entity->flush();
        }


        $content = $this
            ->renderView(
                'AAPlatformBundle:Advert:add.html.twig', array()
            );

        return new Response($content);
    }
}