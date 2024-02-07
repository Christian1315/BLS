<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Partie;
use App\Models\PartiesCategory;
use Illuminate\Support\Facades\Validator;

class PARTIE_HELPER extends BASE_HELPER
{
    static function add_rules(): array
    {
        return [
            "name" => ["required"],
            "phone" => ["required"],
            "email" => ["required"],
            "partiecategory_id" => "required|integer",
            "partietype_id" => "required|integer",




        ];
    }

    static function add_messages(): array
    {
        return [
            "nom.required" => "Le nom de la partie  est réquis!",
            "phone.required" => "Le numero de telephone    est réquis!",
            "email.required" => "La descriptionde la catégorie  est réquise!",
            
            "partiecategory_id.required" => "La qualité du colligant  est réquise!",
            'partiecategory_id.integer' => 'Le champ  doit être un entier',
           
            "partietype_id.required" => "L'identité du colligant  est réquis!",
            'partietype_id.integer' => 'Le champ  doit être un entier',
             

             
        ];
    }

    static function PartieCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createPartie($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        
        $partie = Partie::create($formData); #ENREGISTREMENT DE LA CATEGORIE DANS LA DB

        return self::sendResponse($partie, 'Partie ajoutée avec succès!!');
    }
    static function getPartie()
    {
        $partie =  Partie::orderBy("id", "desc")->get();
        return self::sendResponse($partie, 'Tout les parties récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN CATEGORIE DE PARTIE##
    static function PartieRetrieve($id)
    {
        $partie = Partie::find($id);
        if (!$partie) {
            return self::sendError("Cette partie n'existe pas!", 404);
        }

        return self::sendResponse($partie, "partie récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN CATEGORIE ____~###
    static function updatepartie($request, $id)
    {
        $formData = $request->all();
        $partie = Partie::find($id);

        // return $user;
        if (!$partie) {
            return self::sendError("Cette catégorie n'existe pas!", 404);
        };

        $partie->update($formData);
        return self::sendResponse($partie, "Votre partie a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UNE CATEGORIE~###


    ##_____ FIN RETRIEVE D'UNE CATEGORIE##
    static function deletepartie($request, $id)
    {
        $formData = $request->all();

        $partie = Partie::find($id);

        // return $user;
        if (!$partie) {
            return self::sendError("Cette partie n'existe pas!", 404);
        };

        $partie->delete($formData);
        return self::sendResponse($partie, "Votre partie a été supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UNE CATEGORIE~###

    
}
