<?php

namespace AA\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


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
        $tag = ($request->query->get('tag'))? $request->query->get('tag') : false;

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

        return new Response($content);
    }

    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '" . $slug . "', créée en " . $year . " et au format " . $_format . "."
        );
    }
}