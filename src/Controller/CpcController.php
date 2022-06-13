<?php

namespace App\Controller;

use App\Repository\CpcRepository;
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

class CpcController extends AbstractController
{

    #[Route('/DataTableCpcQuery', name: 'DataTableCpcQuery')]
    public function DataTableCpcQuery(CpcRepository $RepoCpc ,BalanceRepository $RepoBalance, Request $request): Response
    {
        $organisme_id    = $request->get('organisme_id');
        $dossier_id      = $request->get('dossier_id');
        $sous_dossier_id = $request->get('sous_dossier_id');
        

        if ($organisme_id && !$sous_dossier_id && !$dossier_id) {

            $cpcs = $RepoCpc->clickOrganisme($organisme_id);

        }elseif ($dossier_id && !$sous_dossier_id) {

            $cpcs = $RepoCpc->clickDossier($dossier_id);

        }elseif ($sous_dossier_id) {

            $cpcs = $RepoCpc->clickSousDossier($sous_dossier_id);

        }

        $html = $this->render('includes/DataTableCpcQuery.html.twig',['cpcs' => $cpcs])->getContent();
            
            return new JsonResponse($html);
    }

    #[Route('/TableTopCpcTout', name: 'TableTopCpcTout')]
    public function TableTopCpcTout(BalanceRepository $RepoBalance, Request $request): Response
    {
        $organisme_id = $request->get('organisme_id');
        $sous_Dossier = $request->get('sous_Dossier');
        $IdPoste = $request->get('poste');
        $dossier_id = $request->get('dossier_id');

        if ($IdPoste && !$organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TableTopCpc($IdPoste);

        }elseif ($organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TableTopCpcOrg($IdPoste ,$organisme_id);

        }elseif ($dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TableTopCpcDos($IdPoste, $dossier_id);

        }elseif ($sous_Dossier) {
            
            $Balances = $RepoBalance->TableTopCpcSous($IdPoste ,$sous_Dossier);
        }

        $html = "";
        $mtTotal = 0;


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
                        <td $style>" . number_format( $balance["Solde"],2, ' , ' ,  '  ') . "</td>
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

    #[Route('/TableButtonCpcTout', name: 'TableButtonCpcTout')]
    public function TableButtonCpcTout(BalanceRepository $RepoBalance, Request $request): Response
    {
        $organisme_id = $request->get('organisme_id');
        $sous_Dossier = $request->get('sous_Dossier');
        $IdPoste = $request->get('poste');
        $dossier_id = $request->get('dossier_id');
        $compte = $request->get('compte');
        
        if ($compte && !$organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonCpc($compte);

        }elseif ($organisme_id && !$dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonCpcOrg($organisme_id,$compte);

        }elseif ($dossier_id && !$sous_Dossier) {

            $Balances = $RepoBalance->TablebuttonCpcDos($dossier_id,$compte);

        }elseif ($sous_Dossier) {
            
            $Balances = $RepoBalance->TablebuttonCpcSous($sous_Dossier,$compte);
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
                        <td $style>" . number_format( $balance["Solde"],2, ' , ' ,  '  ') . "</td>
                        <td $style></td>
                    </tr>
                ";

            }
            
        return new JsonResponse($html);

    }
}
