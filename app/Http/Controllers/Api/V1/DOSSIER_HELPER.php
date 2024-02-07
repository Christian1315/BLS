<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Avocat;
use App\Models\AvocatDossier;
use App\Models\CategorieDossier;
use App\Models\Client;
use App\Models\Collaborateur;
use App\Models\CollaborateurDossier;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\DossiersDocument;
use App\Models\DossiersJuridiction;
use App\Models\Juridiction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DOSSIER_HELPER extends BASE_HELPER
{
    ##======== REGISTER VALIDATION =======##
    static function dossier_rules(): array
    {
        return [
            "name" => ['required', Rule::unique("dossiers")],
            'num' => ['required', Rule::unique("dossiers")],
            'reference' => ['required', Rule::unique("dossiers")],
            'date_create' => 'required',
            'commentaire' => 'required',
            'amount' => 'required',
            'statut' => 'required |integer',
            'category' => 'required|integer',


        ];
    }

    static function dossier_messages(): array
    {
        return [
            'name.required' => 'Le nom du dossier est réquis!',
            'name.unique' => 'Un dossier existe déjà avec ce nom!',
            'num.required' => 'Le champ numero est requis!',
            'num.unique' => 'Un dossier existe déjà avec ce numero!',
            'reference.required' => 'La reference du dossier est réquis!',
            'reference.unique' => 'Un dossier existe déjà avec cette reference!',

            'statut.required' => 'La reference du dossier est réquis!',
            'statut.integer' => 'Le champ  doit être un entier',
            'amount.required' => 'Le montant du dossier est réquis',

            'date_create.required' => 'Veuillez précisez la date de creation du dossier ',
            'category.required' => 'La categorie du dossier est réquis',
            'category.integer' => 'Le champ  doit être un entier',

            'commentaire.required' => 'Laissez un commentaire sur le dossier',


        ];
    }

    static function DossierCreate_Validator($formDatas)
    {
        $rules = self::dossier_rules();
        $messages = self::dossier_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }

    static function createDossier($request)
    {
        $user = request()->user();
        $formData = $request->all();
        $formData["user"] = $user->id;

        $category = CategorieDossier::find($formData["category"]);
        if (!$category) {
            return self::sendError("Cette categorie de dossier n'existe pas!", 404);
        }
        $formData["category"] = $category->id;
        ##ENREGISTREMENT DU DOSSIER
        $client = Dossier::create($formData);
        return self::sendResponse($client, 'Dossier ajouté avec succès!!');
    }

    ##RETRIEVE D'UN DOSSIER
    static function retrieveDossier($id)
    {
        ## VERIFIER D'ABOBRD SI LE DOSSIER EXISTE
        $client = Dossier::with(["juridictions","avocats","collaborateurs"])->find($id);
        if (!$client) {
            return self::sendError('Ce dossier n\'existe pas!', 404);
        };
        return self::sendResponse($client, "Dossier récupéré avec succès");
    }

    ##RECUPERER TOUS LES DOSSIER PAR ORDER DECROISSANT
    static function getdossier()
    {
        $dosssiers = Dossier::with(["juridictions","avocats","collaborateurs"])->orderBy('id', 'desc')->get();
        return self::sendResponse($dosssiers, 'Liste des dossiers récupérés avec succès!!');
    }
    ##MODIFICATION D'UN DOSSIER
    static function updateDossier($request, $id)
    {
        $user = request()->user();
        $formData = $request->all();
        $client = Dossier::find($id);

        if (!$client) {
            return self::sendError("Ce dossier n'existe pas!", 404);
        }

        if ($request->get("num")) {
            $phone = Client::where(["num" => $request->get("num")])->first();
            if ($phone) {
                return self::sendError("Ce numero existe déjà", 505);
            }
        }

        if ($request->get("nom")) {
            $email = Client::where(["nom" => $request->get("nom")])->first();
            if ($email) {
                return self::sendError("Ce nom existe déjà", 505);
            }
        }

        $client->update($formData);
        return self::sendResponse($client, "Dossier modifié avec succès!!");
    }
    ## SUPPRIMER UN DOSSIER
    static function deleteDossier($id)
    {
        $user = request()->user();
        $client = Dossier::find($id);

        if (!$client) {
            return self::sendError("Ce Dossier n'existe pas", 404);
        }
        $client->delete(); ### SUPPRESSION DU DOSSIER;
        return self::sendResponse($client, " Le Dossier a été supprimé avec succès!!");
    }
    static function affectDossier($request, $id)
    {
        $dossier = Dossier::find($id);
        $juridiction = Juridiction::find($request->get("juridiction"));

        if (!$request->get("juridiction")) {
            return self::sendError("Le juridiction  est réquise!", 404);
        }
        // return $user;
        if (!$dossier) {
            return self::sendError("Ce dossier n'existe pas!", 404);
        };
        if (!$juridiction) {
            return self::sendError("Cette juridiction n'existe pas!", 404);
        };

        ##__VERIFIONS D'ABORD SI CETTE AFFECTATION EXISTE DEJA
        $is_this_affectation_existe = DossiersJuridiction::where(["dossier_id" => $id, "juridiction_id" => $request->get("juridiction")])->first();


        if ($is_this_affectation_existe) {
            return self::sendError("Ce dossier a déjà été affecté à cette juridiction!", 505);
        }

        ##___AFFECTATION PROPREMENT DITE
        $affectation = DossiersJuridiction::create(["dossier_id" => $id, "juridiction_id" => $request->get("juridiction")]);

        return self::sendResponse($affectation, "Dossier  affecté a la juridiction  avec succès ");
    }



    static function affectAvocat($request, $id)
    {
        $dossier = Dossier::find($id);
        $avocat = Avocat::find($request->get("avocat"));

        if (!$request->get("avocat")) {
            return self::sendError(" L'avocat  est réquise!", 404);
        }
        // return $user;
        if (!$dossier) {
            return self::sendError("Ce dossier n'existe pas!", 404);
        };
        if (!$avocat) {
            return self::sendError("Cet avocat n'existe pas!", 404);
        };

        ##__VERIFIONS D'ABORD SI CETTE AFFECTATION EXISTE DEJA
        $is_this_affectation_existe = AvocatDossier::where(["dossier_id" => $id, "avocat_id" => $request->get("avocat")])->first();


        if ($is_this_affectation_existe) {
            return self::sendError("Ce dossier a déjà été affecté à cet avocat!", 505);
        }

        ##___AFFECTATION PROPREMENT DITE
        $affectation = AvocatDossier::create(["dossier_id" => $id, "avocat_id" => $request->get("avocat")]);

        return self::sendResponse($affectation, "Dossier  affecté a l'avocat  avec succès ");
    }

    static function affectCollaborateur($request, $id)
    {
        $dossier = Dossier::find($id);
        $collaborateur = Collaborateur::find($request->get("collaborateur"));

        if (!$request->get("collaborateur")) {
            return self::sendError(" Le Collaborateur  est réquise!", 404);
        }
        // return $user;
        if (!$dossier) {
            return self::sendError("Ce dossier n'existe pas!", 404);
        };
        if (!$collaborateur) {
            return self::sendError("Ce Collaborateur n'existe pas!", 404);
        };

        ##__VERIFIONS D'ABORD SI CETTE AFFECTATION EXISTE DEJA
        $is_this_affectation_existe = CollaborateurDossier::where(["dossier_id" => $id, "collaborateur_id" => $request->get("collaborateur")])->first();


        if ($is_this_affectation_existe) {
            return self::sendError("Ce dossier a déjà été affecté à ce Collaborateur!", 505);
        }

        ##___AFFECTATION PROPREMENT DITE
        $affectation = CollaborateurDossier::create(["dossier_id" => $id, "collaborateur_id" => $request->get("collaborateur")]);

        return self::sendResponse($affectation, "Dossier  affecté a l'avocat  avec succès ");
    }
     static function affectDocument($request, $id)
     {
         $dossier = Dossier::find($id);
         $document = Document::find($request->get("document"));
 
         if (!$request->get("document")) {
             return self::sendError(" Le document  est réquise!", 404);
         }
         // return $user;
         if (!$dossier) {
             return self::sendError("Ce dossier n'existe pas!", 404);
         };
         if (!$document) {
             return self::sendError("Ce document n'existe pas!", 404);
         };
 
         ##__VERIFIONS D'ABORD SI CETTE AFFECTATION EXISTE DEJA
         $is_this_affectation_existe = DossiersDocument::where(["dossier_id" => $id, "document_id" => $request->get("document")])->first();
 
 
         if ($is_this_affectation_existe) {
             return self::sendError("Ce document a déjà été affecté à ce dossier!", 505);
         }
 
         ##___AFFECTATION PROPREMENT DITE
         $affectation = DossiersDocument::create(["dossier_id" => $id, "document_id" => $request->get("document")]);
 
         return self::sendResponse($affectation, "Document  affecté au dossier  avec succès ");
     }
}
