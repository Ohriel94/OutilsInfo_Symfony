<?php

namespace App\Controller;

use App\Repository\OrdinateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffectationAppareilController extends AbstractController
{
    #[Route('/affectation/appareil', name: 'app_affectation_appareil')]
    public function index(OrdinateurRepository $ordinateurRepository, ): Response
    {
    //  const getUsers = () => {
	//   console.log('getUsers');
	//   const f = async () => {
	//    try {
	//     const getUsersRequest = await Axios({
	//      method: 'get',
	//      url: 'http://localhost:3001/usagers',
	//     });
	//     getUsersRequest.data.map((usager) => {
	//      usager.label = usager.prenom + ' ' + usager.nom;
	//     });
	//     getUsersRequest.data.map((usager) => {
	//      usager.appareilsAffectes.map((appareil) => {
	//       appareil.id = `item-${Math.floor(Math.random() * 90000001)}`;
	//      });
	//     });
	//     setUsagers(getUsersRequest.data);
	//    } catch (e) {
	//     console.log('Failed to connect ' + e);
	//    }
	//   };
	//   f();
	//  };

	//  const getOrdinateurs = () => {
	//   const g = async () => {
	//    try {
	//     const getOrdinateursRequest = await Axios({
	//      method: 'get',
	//      url: 'http://localhost:3001/ordinateurs',
	//     });
	//     getOrdinateursRequest.data.map((ordinateur) => {
	//      ordinateur.id = `item-${Math.floor(Math.random() * 90000001)}`;
	//     });
	//     setOrdinateurs(getOrdinateursRequest.data);
	//    } catch (e) {
	//     console.log('Failed to connect ' + e);
	//    }
	//   };
	//   g();
	//  };

        return $this->render('affectation_appareil/index.html.twig', [
            'controller_name' => 'AffectationAppareilController',
        ]);
    }
}
