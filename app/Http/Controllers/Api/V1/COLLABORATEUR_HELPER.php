<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Collaborateur;
use Illuminate\Support\Facades\Validator;

class COLLABORATEUR_HELPER extends BASE_HELPER
{
    static function add_rules(): array
    {
        return [
            "name" => ["required"],
            "phone" => ["required"],
            "email" => ["required"],

        ];
    }

    static function add_messages(): array
    {
        return [
            "nom.required" => "Le nom du collaborateur  est réquis!",
            "phone.required" => "Le numero de telephone  du collaborateur   est réquis!",
            "email.required" => "L'adresse mail du collaborateur   est réquise!",
            
             
        ];
    }

    static function CollaborateurCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createCollaborateur($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        
        $collaborateur = Collaborateur::create($formData); #ENREGISTREMENT DE LA CATEGORIE DANS LA DB

        return self::sendResponse($collaborateur, 'Collaborateur ajoutée avec succès!!');
    }
    static function getCollaborateur()
    {
        $collaborateur =  Collaborateur::orderBy("id", "desc")->get();
        return self::sendResponse($collaborateur, 'Tout les Collaborateur récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN CATEGORIE DE PARTIE##
    static function CollaborateurRetrieve($id)
    {
        $collaborateur = Collaborateur::find($id);
        if (!$collaborateur) {
            return self::sendError("Ce Collaborateur n'existe pas!", 404);
        }

        return self::sendResponse($collaborateur, "Collaborateur récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN CATEGORIE ____~###
    static function updatecollaborateur($request, $id)
    {
        $formData = $request->all();
        $collaborateur = Collaborateur::find($id);

        // return $user;
        if (!$collaborateur) {
            return self::sendError("Ce Collaborateur n'existe pas!", 404);
        };

        $collaborateur->update($formData);
        return self::sendResponse($collaborateur, "Votre Collaborateur a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UNE CATEGORIE~###


    ##_____ FIN RETRIEVE D'UNE CATEGORIE##
    static function deletecollaborateur($request, $id)
    {
        $formData = $request->all();

        $collaborateur = Collaborateur::find($id);

        // return $user;
        if (!$collaborateur) {
            return self::sendError("Ce Collaborateur n'existe pas!", 404);
        };

        $collaborateur->delete($formData);
        return self::sendResponse($collaborateur, "Votre partie a été supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UNE CATEGORIE~###

    
}
