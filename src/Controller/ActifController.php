<?php

namespace App\Controller;

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
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class ActifController extends AbstractController
{
    #[Route('/tesss', name: 'app_actif')]
    public function tesss(ActifRepository $RepoActif ,BalanceRepository $RepoBalance, Request $request ,POrganismesRepository $RepoPOrganismes): Response
    {
        
        $organisme_id    = "1";
        $dossier_id    = "1";
        $sous_dossier_id    = "1";

        if ($organisme_id && !$sous_dossier_id && !$dossier_id) {

            $activs = $RepoActif->clickOrganisme($organisme_id);

                $TotalA = 0; 
                $TotalB = 0;
                $TotalC = 0; 
                $TotalD = 0; 
                $TotalE = 0; 
                $TotalAE = 0; 
                $TotalF = 0; 
                $TotalG = 0; 
                $TotalH = 0; 
                $TotalI = 0; 
                $TotalFI = 0; 

                

                foreach ($activs as $s){

                    if ($s["type"] == "A") {
                        $TotalA = $TotalA + $s["Exer1"];
                    }
                    elseif($s["type"] == "B"){
                        $TotalB = $TotalB + $s["Exer1"];
                    }
                    elseif($s["type"]== "C"){
                        $TotalC = $TotalC + $s["Exer1"];
                    }
                    elseif($s["type"]== "D"){
                        $TotalD = $TotalD + $s["Exer1"];
                    }
                    elseif($s["type"]== "E"){
                        $TotalE = $TotalE + $s["Exer1"] ;
                    }
                    elseif($s["type"]== "F"){
                        $TotalF = $TotalF + $s["Exer1"];
                    }
                    elseif($s["type"]== "G"){
                        $TotalG = $TotalG + $s["Exer1"];
                    }
                    elseif($s["type"]== "H"){
                        $TotalH = $TotalH + $s["Exer1"];
                    }
                    elseif($s["type"]== "I"){
                        $TotalI = $TotalI + $s["Exer1"];
                    }

                    
                    
                }

                    if ($s["type"] == 'TA') {
                        $s["Exer1"] = $TotalA;
                    }
                    elseif($s["type"] == "TB"){
                        $s["Exer1"] = $TotalB;
                    }
                    elseif($s["type"] == "TC"){
                        $s["Exer1"] = $TotalC;
                    }
                    elseif($s["type"] == "TD"){
                        $s["Exer1"] = $TotalD;
                    }
                    elseif($s["type"] == "TE"){
                        $s["Exer1"] = $TotalE ;
                    }
                    elseif($s["type"] == "TAE"){
                        $s["Exer1"] = $TotalA + $TotalB + $TotalC + $TotalD + $TotalE;
                    }
                    elseif($s["type"] == "TF"){
                        $s["Exer1"] = $TotalF;
                    }
                    elseif($s["type"] == "TG"){
                        $s["Exer1"] = $TotalG;
                    }
                    elseif($s["type"] == "TH"){
                        $s["Exer1"] = $TotalH;
                    }
                    elseif($s["type"] == "TI"){
                        $s["Exer1"] = $TotalI;
                    }
                    elseif($s["type"] == "TFI"){
                        $s["Exer1"] = $TotalF + $TotalG + $TotalH + $TotalI;
                    }

                }

        if ($dossier_id && !$sous_dossier_id) {

            $activs = $RepoActif->clickDossier($dossier_id);

                $TotalA = 0; 
                $TotalB = 0;
                $TotalC = 0; 
                $TotalD = 0; 
                $TotalE = 0; 
                $TotalAE = 0; 
                $TotalF = 0; 
                $TotalG = 0; 
                $TotalH = 0; 
                $TotalI = 0; 
                $TotalFI = 0; 

                foreach ($activs as $s){

                    if ($s["type"] == "A") {
                        $TotalA = $TotalA + $s["Exer2"];
                    }
                    elseif($s["type"] == "B"){
                        $TotalB = $TotalB + $s["Exer2"];
                    }
                    elseif($s["type"]== "C"){
                        $TotalC = $TotalC + $s["Exer2"];
                    }
                    elseif($s["type"]== "D"){
                        $TotalD = $TotalD + $s["Exer2"];
                    }
                    elseif($s["type"]== "E"){
                        $TotalE = $TotalE + $s["Exer2"] ;
                    }
                    elseif($s["type"]== "F"){
                        $TotalF = $TotalF + $s["Exer2"];
                    }
                    elseif($s["type"]== "G"){
                        $TotalG = $TotalG + $s["Exer2"];
                    }
                    elseif($s["type"]== "H"){
                        $TotalH = $TotalH + $s["Exer2"];
                    }
                    elseif($s["type"]== "I"){
                        $TotalI = $TotalI + $s["Exer2"];
                    }
                    
                }

                    if ($s["type"] == 'TA') {
                        $s["Exer2"] = $TotalA;
                    }
                    elseif($s["type"] == "TB"){
                        $s["Exer2"] = $TotalB;
                    }
                    elseif($s["type"] == "TC"){
                        $s["Exer2"] = $TotalC;
                    }
                    elseif($s["type"] == "TD"){
                        $s["Exer2"] = $TotalD;
                    }
                    elseif($s["type"] == "TE"){
                        $s["Exer2"] = $TotalE ;
                    }
                    elseif($s["type"] == "TAE"){
                        $s["Exer2"] = $TotalA + $TotalB + $TotalC + $TotalD + $TotalE;
                    }
                    elseif($s["type"] == "TF"){
                        $s["Exer2"] = $TotalF;
                    }
                    elseif($s["type"] == "TG"){
                        $s["Exer2"] = $TotalG;
                    }
                    elseif($s["type"] == "TH"){
                        $s["Exer2"] = $TotalH;
                    }
                    elseif($s["type"] == "TI"){
                        $s["Exer2"] = $TotalI;
                    }
                    elseif($s["type"] == "TFI"){
                        $s["Exer2"] = $TotalF + $TotalG + $TotalH + $TotalI;
                    }

                }

            if ($sous_dossier_id) {
    
                $activs = $RepoActif->clickSousDossier($sous_dossier_id);
    
                    $TotalA = 0; 
                    $TotalB = 0;
                    $TotalC = 0; 
                    $TotalD = 0; 
                    $TotalE = 0; 
                    $TotalAE = 0; 
                    $TotalF = 0; 
                    $TotalG = 0; 
                    $TotalH = 0; 
                    $TotalI = 0; 
                    $TotalFI = 0; 
    
                    
    
                    foreach ($activs as $s){
    
                        if ($s["type"] == "A") {
                            $TotalA = $s["Total"];
                        }
                        elseif($s["type"] == "B"){
                            $TotalB = $TotalB + $s["Total"];
                        }
                        elseif($s["type"]== "C"){
                            $TotalC = $TotalC + $s["Total"];
                        }
                        elseif($s["type"]== "D"){
                            $TotalD = $TotalD + $s["Total"];
                        }
                        elseif($s["type"]== "E"){
                            $TotalE = $TotalE + $s["Total"] ;
                        }
                        elseif($s["type"]== "F"){
                            $TotalF = $TotalF + $s["Total"];
                        }
                        elseif($s["type"]== "G"){
                            $TotalG = $TotalG + $s["Total"];
                        }
                        elseif($s["type"]== "H"){
                            $TotalH = $TotalH + $s["Total"];
                        }
                        elseif($s["type"]== "I"){
                            $TotalI = $TotalI + $s["Total"];
                        }
    
                    }
    
                        if ($s["type"] == 'TA') {
                            $s["Total"] = $TotalA;
                        }
                        elseif($s["type"] == "TB"){
                            $s["Total"] = $TotalB;
                        }
                        elseif($s["type"] == "TC"){
                            $s["Total"] = $TotalC;
                        }
                        elseif($s["type"] == "TD"){
                            $s["Total"] = $TotalD;
                        }
                        elseif($s["type"] == "TE"){
                            $s["Total"] = $TotalE ;
                        }
                        elseif($s["type"] == "TAE"){
                            $s["Total"] = $TotalA + $TotalB + $TotalC + $TotalD + $TotalE;
                        }
                        elseif($s["type"] == "TF"){
                            $s["Total"] = $TotalF;
                        }
                        elseif($s["type"] == "TG"){
                            $s["Total"] = $TotalG;
                        }
                        elseif($s["type"] == "TH"){
                            $s["Total"] = $TotalH;
                        }
                        elseif($s["type"] == "TI"){
                            $s["Total"] = $TotalI;
                        }
                        elseif($s["type"] == "TFI"){
                            $s["Total"] = $TotalF + $TotalG + $TotalH + $TotalI;
                        }
    
                    }
                    

            return $this->render('actif/index.html.twig');

    }

    #[Route('/DataTableActifQuery', name: 'DataTableActifQuery')]
    public function DataTableActifQuery(ActifRepository $RepoActif ,BalanceRepository $RepoBalance, Request $request): Response
    {
        $organisme_id    = $request->get('organisme_id');
        $dossier_id      = $request->get('dossier_id');
        $sous_dossier_id = $request->get('sous_dossier_id');

        if ($organisme_id && !$sous_dossier_id && !$dossier_id) {

            $activs = $RepoActif->clickOrganisme($organisme_id);

        }elseif ($dossier_id && !$sous_dossier_id) {

            $activs = $RepoActif->clickDossier($dossier_id);

        }elseif ($sous_dossier_id) {

            $activs = $RepoActif->clickSousDossier($sous_dossier_id);

        }

        $html = $this->render('includes/DataTableActifQuery.html.twig',['activs' => $activs])->getContent();
            
            return new JsonResponse($html);
    }

    #[Route('/TableTopActifTout', name: 'TableTopActifTout')]
    public function TableTopActifTout(BalanceRepository $RepoBalance, Request $request): Response
    {
        $organisme_id = $request->get('organisme_id');
        $sous_Dossier = $request->get('sous_Dossier');
        $IdPoste = $request->get('poste');
        $dossier_id = $request->get('dossier_id');

        if ($IdPoste && !$organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TableTopActif($IdPoste);

        }elseif ($organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TableTopActifOrg($IdPoste ,$organisme_id);

        }elseif ($dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TableTopActifDos($IdPoste, $dossier_id);

        }elseif ($sous_Dossier) {
            
            $Balances = $RepoBalance->TableTopActifSous($IdPoste ,$sous_Dossier);
        }

        $html = "";
        $mtTotal = 0;

            foreach ($Balances as $balance) {
                if (strlen($balance["Libelle"]) > 20) {
                    $libelle = mb_substr($balance["Libelle"], 0, 20) . '<span style=" position: sticky; font-weight:300; cursor:pointer" class="hint--success" aria-label="' . $balance["Libelle"] . '"> ' . '&nbsp;...' . '</span>';
                } else {
                    $libelle = $balance["Libelle"];
                }
                $style = 'style="text-align:end;"';

                $html .= "
                    <tr>
                        <td style='float: left;'>" . $libelle . "</td>
                        <td style='text-align:center;'>" . number_format( $balance["Solde"],2, ' , ' ,  '  ') . "</td>
                        <td $style></td>
                    </tr>
                ";
            $mtTotal += $balance["Solde"];

            }
            $html .= '
                <tr>
                    <td colspan="3" style="text-align:center; border: solid cadetblue;"> TOTAL : '.number_format($mtTotal,2, ' , ' ,  '  ').' </td>
                </tr>';
        
        return new JsonResponse($html);
    }

    #[Route('/TableButtonActifTout', name: 'TableButtonActifTout')]
    public function TableButtonActifTout(BalanceRepository $RepoBalance, Request $request): Response
    {

        $organisme_id = $request->get('organisme_id');
        $sous_Dossier = $request->get('sous_Dossier');
        $dossier_id = $request->get('dossier_id');
        $compte = $request->get('compte');
        
        if ($compte && !$organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonActif($compte);

        }elseif ($organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonActifOrg($organisme_id,$compte);

        }elseif ($dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonActifDos($dossier_id,$compte);

        }elseif ($sous_Dossier) {
            
            $Balances = $RepoBalance->TablebuttonActifSous($sous_Dossier,$compte);
        }

            $html = "";


            foreach ($Balances as $balance) {
                if (strlen($balance["Libelle"]) > 25) {
                    $libelle = mb_substr($balance["Libelle"], 0, 25) . '<span style="position: sticky; font-weight:bold; cursor:pointer" class="hint--top hint--error" aria-label="' . $balance["Libelle"] . '"> ' . '&nbsp;...' . '</span>';
                } else {
                    $libelle = $balance["Libelle"];
                }
                $style = 'style="text-align:end;"';

                $html .= "
                    <tr>
                        <td style='float: left;'>" . $libelle . "</td>
                        <td style='text-align:right;'>" . number_format( $balance["Solde"],2, ' , ' ,  '  ') . "</td>
                        <td $style></td>
                    </tr>
                ";

            }

        return new JsonResponse($html);

    }

    
}
