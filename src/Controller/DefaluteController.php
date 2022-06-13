<?php

namespace App\Controller;

use App\Entity\Cpc;
use App\Entity\Actif;
use App\Entity\Balance;
use App\Entity\PDossier;
use App\Entity\POrganismes;
use App\Repository\CpcRepository;
use App\Repository\ActifRepository;
use App\Repository\PassifRepository;
use App\Repository\BalanceRepository;
use App\Repository\PDossierRepository;
use App\Repository\POrganismesRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\PSousDossiersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class DefaluteController extends AbstractController
{
    private $em;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->em = $doctrine->getManager();
    }

    #[Route('/test', name:'test')]
    public function test(Request $request)
    {
        $ResultatNet = $request->get('ResultatNet');

        $session = new Session();

        $session->set('ResultatNet',$ResultatNet);

        return $this->json("test");

    }

   
    #[Route('/passif', name: 'passif')]
    public function passif(CpcRepository $RepoCpc , PSousDossiersRepository $RepoPSousDossiers, PDossierRepository $RepoPDossier, PassifRepository $RepoPassif, BalanceRepository $RepoBalance, POrganismesRepository $RepoPOrganismes, Request $request): Response
    {
        $session = new Session();

            $ResultatNet   = $session->get('ResultatNet');
            $soldesYears   = $RepoPassif->clickYear();

        return $this->render('defalute/passif.html.twig', [
            'soldesYears'   => $soldesYears,
            'ResultatNet'   => $ResultatNet
        ]);
    }


    #[Route('/DataTableQuery', name: 'DataTableQuery')]
    public function DataTableQuery(CpcRepository $RepoCpc , PassifRepository $RepoPassif , Request $request): Response
    {

            $organisme_id    = $request->get('organisme_id');
            $dossier_id      = $request->get('dossier_id');
            $sous_Dossier    = $request->get('sous_Dossier');

            if ($organisme_id && !$dossier_id && !$sous_Dossier) {

                    $Balances = $RepoCpc->clickOrganisme($organisme_id);

                    $TotalA = 0; 
                    $TotalB = 0; 
                    $TotalAB = 0;
                    $TotalC = 0; 
                    $TotalD = 0; 
                    $TotalE = 0; 
                    $TotalF = 0; 
                    $TotalG = 0; 

                    foreach ($Balances as $s){

                        if ( $s["type"] == "A") {
                            $TotalA = $TotalA + $s["Exer1"] + $s["Exer2"];
                        }
                        elseif($s["type"] == "B"){
                            $TotalB = $TotalB + $s["Exer1"] + $s["Exer2"];
                        }
                        elseif($s["type"]== "C"){
                            $TotalC = $TotalC + $s["Exer1"] + $s["Exer2"];
                        }
                        elseif($s["type"]== "D"){
                            $TotalD = $TotalD + $s["Exer1"] + $s["Exer2"];
                        }
                        elseif($s["type"]== "E"){
                            $TotalE = $TotalE + $s["Exer1"] + $s["Exer2"] ;
                        }
                        elseif($s["type"]== "F"){
                            $TotalF = $TotalF + $s["Exer1"] + $s["Exer2"];
                        }
                        elseif($s["type"]== "G"){
                            $TotalG = $TotalG + $s["Exer1"] + $s["Exer2"];
                        }

                    }

                        $TotalAB = $TotalA + $TotalB ;
                        $TotalAC = $TotalAB - $TotalC ;
                        $TotalDE = $TotalD - $TotalE ;
                        $TotalAE =  $TotalAC + $TotalDE;
                        $TotalFG =  $TotalF - $TotalG;
                        $TotalNET =  $TotalAE + $TotalFG;

                }


            if ($dossier_id && !$sous_Dossier) {

                $Balances1 = $RepoCpc->clickDossier($dossier_id);

                $TotalA = 0; 
                $TotalB = 0; 
                $TotalAB = 0;
                $TotalC = 0; 
                $TotalD = 0; 
                $TotalE = 0; 
                $TotalF = 0; 
                $TotalG = 0; 

                foreach ($Balances1 as $s){

                    if ( $s["type"] == "A") {
                        $TotalA = $TotalA + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"] == "B"){
                        $TotalB = $TotalB + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "C"){
                        $TotalC = $TotalC + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "D"){
                        $TotalD = $TotalD + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "E"){
                        $TotalE = $TotalE + $s["Exer1"] + $s["Exer2"] ;
                    }
                    elseif($s["type"]== "F"){
                        $TotalF = $TotalF + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "G"){
                        $TotalG = $TotalG + $s["Exer1"] + $s["Exer2"];
                    }

                }

                $TotalAB = $TotalA + $TotalB ;
                $TotalAC = $TotalAB - $TotalC ;
                $TotalDE = $TotalD - $TotalE ;
                $TotalAE =  $TotalAC + $TotalDE;
                $TotalFG =  $TotalF - $TotalG;
                $TotalNET =  $TotalAE + $TotalFG;

            }

            if ($sous_Dossier) {

                $Balances2 = $RepoCpc->clickSousDossier($sous_Dossier);

                $TotalA = 0; 
                $TotalB = 0; 
                $TotalAB = 0;
                $TotalC = 0; 
                $TotalD = 0; 
                $TotalE = 0; 
                $TotalF = 0; 
                $TotalG = 0; 

                foreach ($Balances2 as $s){

                    if ( $s["type"] == "A") {
                        $TotalA = $TotalA + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"] == "B"){
                        $TotalB = $TotalB + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "C"){
                        $TotalC = $TotalC + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "D"){
                        $TotalD = $TotalD + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "E"){
                        $TotalE = $TotalE + $s["Exer1"] + $s["Exer2"] ;
                    }
                    elseif($s["type"]== "F"){
                        $TotalF = $TotalF + $s["Exer1"] + $s["Exer2"];
                    }
                    elseif($s["type"]== "G"){
                        $TotalG = $TotalG + $s["Exer1"] + $s["Exer2"];
                    }

                }

                $TotalAB = $TotalA + $TotalB ;
                $TotalAC = $TotalAB - $TotalC ;
                $TotalDE = $TotalD - $TotalE ;
                $TotalAE =  $TotalAC + $TotalDE;
                $TotalFG =  $TotalF - $TotalG;
                $TotalNET =  $TotalAE + $TotalFG;

            }

            
                if ($organisme_id && !$sous_Dossier && !$dossier_id) {

                    $Balances = $RepoPassif->clickOrganisme($organisme_id);

                }elseif ($dossier_id && !$sous_Dossier) {

                    $Balances = $RepoPassif->clickDossier($dossier_id);

                }elseif ($sous_Dossier) {

                    $Balances = $RepoPassif->clickSousDossier($sous_Dossier);
                }
        
        $html = $this->render('includes/DataTableQuery.html.twig',['Balances' => $Balances, 'TotalNET'  => $TotalNET])->getContent();
        return new JsonResponse($html);

    }
    
    #[Route('/TableTopTout', name: 'TableTopTout')]
    public function TableTopTout(BalanceRepository $RepoBalance, Request $request): Response
    {
        $IdOrg   = $request->get('organisme_id');
        $IdSous  = $request->get('sous_Dossier');
        $IdPoste = $request->get('poste');
        $IdDos   = $request->get('dossier_id');

        if ($IdPoste && !$IdOrg && !$IdDos && !$IdSous) {

            $Balances = $RepoBalance->TableTop($IdPoste);

        }elseif ($IdOrg && !$IdDos && !$IdSous) {

            $Balances = $RepoBalance->TableTopOrg($IdOrg,$IdPoste);

        }elseif ($IdDos && !$IdSous) {

            $Balances = $RepoBalance->TableTopDos($IdDos,$IdPoste);

        }elseif ($IdSous) {
            
            $Balances = $RepoBalance->TableTopSous($IdSous,$IdPoste);
        }

        $html = "";
        $mtTotal = 0;


            foreach ($Balances as $balance) {

                if (strlen($balance["Libelle"]) > 20) {

                    $libelle = mb_substr($balance["Libelle"], 0, 20) . '<span style="position: sticky; font-weight:100; cursor:pointer" class="hint--top hint--error" aria-label="' . $balance["Libelle"] . '"> ' . '&nbsp;...' . '</span>';
                
                } else {

                    $libelle = $balance["Libelle"];
                }

                $style = 'style="text-align:end;"';

                $html .= "
                   
                    <tr>
                        <td style='float: left;'>" . $libelle . "</td>
                        <td style='text-align:center;' class='tt'>"  . number_format( $balance["Solde"],2, ' , ' ,  '  ') . "</td>
                        <td $style>" . "</td>
                    </tr>
                                
                ";
            $mtTotal += $balance["Solde"];

        }

        $html .= '
            <tr>
                <td colspan="3" style="text-align:center; border: solid cadetblue;"> TOTAL :   '.number_format($mtTotal,2, ' , ' ,  '  ').' </td>
            </tr>';

        return new JsonResponse($html);
    }

    #[Route('/TableButtonTout', name: 'TableButtonTout')]
    public function TableButtonTout(BalanceRepository $RepoBalance, Request $request): Response
    {
        $organisme_id = $request->get('organisme_id');
        $sous_Dossier = $request->get('sous_Dossier');
        $IdPoste = $request->get('poste');
        $dossier_id = $request->get('dossier_id');
        
        
        
        if ($IdPoste  && !$organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->Tablebutton();

        }elseif ($organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonOrg();

        }elseif ($dossier_id  && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonOrg();

        }elseif ($sous_Dossier ) {
            
            $Balances = $RepoBalance->TablebuttonOrg();
        }

        $html = "";

        foreach ($Balances as $balance) {
            if (strlen($balance["Libelle"]) > 20) {
                $libelle = mb_substr($balance["Libelle"], 0, 20) . '<span style="position: sticky; font-weight:100; cursor:pointer" class="hint--top hint--error" aria-label="' . $balance["Libelle"] . '"> ' . '&nbsp;...' . '</span>';
            } else {
                $libelle = $balance["Libelle"];
            }
            $style = 'style="text-align:end;"';

            $html .= "
                <tr>
                    <td style='float: left;'>" . $libelle . "</td>
                    <td id='total' style='text-align:center;'>" . number_format($balance["Solde"],2, ' , ' ,  '  ') . "</td>
                    <td $style></td>
                </tr>
            ";

        }

        return new JsonResponse($html);

    }

    #[Route('/menu', name: 'menu')]
    public function menu(POrganismesRepository $RepoPOrganismes, Request $request): Response
    {
        $organismes = $RepoPOrganismes->findAll();

        return $this->render('includes/menu.html.twig', [
            'organismes' => $organismes,
            
        ]);
    }
    
}
