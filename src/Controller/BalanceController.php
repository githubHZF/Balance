<?php

namespace App\Controller;

use App\Repository\CpcRepository;
use App\Repository\ActifRepository;
use App\Repository\PassifRepository;
use App\Repository\BalanceRepository;
use App\Repository\PDossierRepository;
use App\Repository\POrganismesRepository;
use App\Repository\PSousDossiersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BalanceController extends AbstractController
{
    #[Route('/side', name:'app_side')]
    public function index(CpcRepository $RepoCpc, ActifRepository $RepoActif ,PSousDossiersRepository $RepoPSousDossiers, PDossierRepository $RepoPDossier, PassifRepository $RepoPassif, BalanceRepository $RepoBalance, POrganismesRepository $RepoPOrganismes, Request $request)
    {

        return $this->render('balance/index.html.twig');

    }

    #[Route('/balance', name:'balance')]
    public function balance(CpcRepository $RepoCpc, ActifRepository $RepoActif ,PSousDossiersRepository $RepoPSousDossiers, PDossierRepository $RepoPDossier, PassifRepository $RepoPassif, BalanceRepository $RepoBalance, POrganismesRepository $RepoPOrganismes, Request $request)
    {
        $session = new Session();
        
                $organisme_id = $request->get('organisme_id');
                $dossier_id   = $request->get('dossier_id');
                $sous_Dossier = $request->get('sous_Dossier');
                $ResultatNet  = $session->get('ResultatNet');

                    $organismes = $RepoPOrganismes->findAll();
                    $PDossiers = $RepoPDossier->findAll();
                    $PSousdossiers = $RepoPSousDossiers->findAll();

                        $soldesYears = $RepoPassif->clickYear();
                        $activs = $RepoActif->clickYear();
                        $cpcs = $RepoCpc->clickYear();
                


        return $this->render('balance/balance.html.twig',[
            'soldesYears'   => $soldesYears,
            'organisme_id'  => $organisme_id,
            'dossier_id'    => $dossier_id,
            'sous_Dossier'  => $sous_Dossier,
            'activs' => $activs,
            'cpcs' => $cpcs,
            'organismes' => $organismes,
            'PDossiers'  => $PDossiers,
            'PSousdossiers' => $PSousdossiers,
            'ResultatNet' => $ResultatNet,
        ]);
    }

    #[Route('/select', name: 'select')]
    public function select(PSousdossiersRepository $RepoPSousdossiers, PDossierRepository $RepoPDossier, Request $request): Response
    {
        $organisme_id = $request->get('organisme_id');
        $dossier_id = $request->get('dossier_id');

        if ($organisme_id && !$dossier_id) {
            
            $PDossier = $RepoPDossier->findBy(['IdOrganisme' => $organisme_id]);
            $html = $this->render('includes/Pdossier.html.twig', ['PDossier' => $PDossier,])->getContent();

        return new JsonResponse($html);

        }elseif ($dossier_id) {

            $sousDossier = $RepoPSousdossiers->findBy(['IdDossier' => $dossier_id]);
            $html = $this->render('includes/SousDossier.html.twig', ['sousDossier' => $sousDossier,])->getContent();

            return new JsonResponse($html);

        }

        return new JsonResponse();

    }

    

}
