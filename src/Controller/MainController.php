<?php

namespace App\Controller;

use App\Model\WeatherModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


// we can add route"/meteo" and it qill be added to all routes inside this controller
class MainController extends AbstractController {
    /**
     * homepage action
     *
     * @Route("/", name="homepage", methods={"GET"})
     * @return Response
     */
    public function homepage(Request $request) :Response
    {
        $session = $request->getSession();
        // $session->clear();
        $chosenCity = $session->get('chosen_city');
        
        // require __DIR__ . '/../../generate.php';
        $cities = WeatherModel::getWeatherData();

        // dd($cities);
        if(!$chosenCity) {
            $cityToDisplay = WeatherModel::getWeatherByCityIndex(mt_rand(0, count($cities) - 1));
            $this->addFlash('notice', 'Sélectionnez une ville dans la liste de gauche');
        } else {
            $cityToDisplay = WeatherModel::getWeatherByCityIndex($chosenCity);
        }
         
        return $this->render('main/homepage.html.twig', [
            'title' => 'Accueil',
            'city_list' => $cities,
            'widget_city' => $cityToDisplay
        ]);
    }

    /**
     * Beaches action
     *
     * @Route("/beaches", name="beaches", methods={"GET"})
     * @Route("/plages", name="beaches_fr", methods={"GET"})
     * @return Response
     */
    public function beaches(Request $request) :Response
    {
        $session = $request->getSession();
        $chosenCity = $session->get('chosen_city');

        $cities = WeatherModel::getWeatherData();

        // dd($cities);
        if(!$chosenCity) {
            $cityToDisplay = $cities[mt_rand(0, count($cities) - 1)];
            $this->addFlash('notice', 'choose one city please');
        } else {
            $cityToDisplay = $cities[$chosenCity];
        }
        // fournir les données à la vue 
        return $this->render('main/beaches.html.twig', [
            'title' => 'Beaches',
            'widget_city' => $cityToDisplay
        ]);
    }

    /**
     * Mountains action
     *
     * @Route("/mountains", name="mountains", methods={"GET"})
     * @return Response
     */
    public function mountains(Request $request) :Response
    {
        $session = $request->getSession();
        $chosenCity = $session->get('chosen_city');

        $cities = WeatherModel::getWeatherData();

        // dd($cities);
        if(!$chosenCity) {
            $cityToDisplay = $cities[mt_rand(0, count($cities) - 1)];
            $this->addFlash('notice', 'choose one city please');
        } else {
            $cityToDisplay = $cities[$chosenCity];
        }

        // fournir les données à la vue 
        return $this->render('main/mountains.html.twig', [
            'title' => 'Mountains',
            'widget_city' => $cityToDisplay
        ]);
    }

    /**
     * add city in the widget
     *
     * @Route("/add/{id}", name="add_id", methods={"GET"})
     * @return Response
     */
    public function add(int $id, Request $request) :Response
    {
        $session = $request->getSession();
        // save id of choosen city
        $chosenCity = $id;
        // clear the rpeviosu chosen city
        $session->clear();
        // put new city id
        $session->set('chosen_city', $chosenCity);

        $this->addFlash('success', 'City chosen');

        // dd($session);
        return $this->redirectToRoute('homepage');
    }

}