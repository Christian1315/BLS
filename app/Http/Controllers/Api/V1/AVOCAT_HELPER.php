<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Avocat;
use App\Models\Partie;
use Illuminate\Support\Facades\Validator;

class AVOCAT_HELPER extends BASE_HELPER
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
            "nom.required" => "Le nom et le prenom de l'avocat sont   réquis!",
            "phone.required" => "Le numero de telephone    est réquis!",
            "email.required" => "L'adresse mail   est réquise!",
            
           
             

             
        ];
    }

    static function AvocatCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createAvocat($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        
        $avocat = Avocat::create($formData); #ENREGISTREMENT DE LA CATEGORIE DANS LA DB

        return self::sendResponse($avocat, 'Avocat ajoutée avec succès!!');
    }
    static function getAvocat()
    {
        $avocat =  Avocat::orderBy("id", "desc")->get();
        return self::sendResponse($avocat, 'Tout les avocats récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN CATEGORIE DE PARTIE##
    static function AvocatRetrieve($id)
    {
        $avocat = Avocat::find($id);
        if (!$avocat) {
            return self::sendError("Cet Avocat n'existe pas!", 404);
        }

        return self::sendResponse($avocat, "Avocat récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN CATEGORIE ____~###
    static function updateavocatzw  ($request, $id)
    {
        $formData = $request->all();
        $avocat = Avocat::find($id);

        // return $user;
        if (!$avocat) {
            return self::sendError("Cet Avocat n'existe pas!", 404);
        };

        $avocat->update($formData);
        return self::sendResponse($avocat, "Votre Avocat a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UNE CATEGORIE~###


    ##_____ FIN RETRIEVE D'UNE CATEGORIE##
    static function deleteavocat($request, $id)
    {
        $formData = $request->all();

        $avocat = Avocat::find($id);

        // return $user;
        if (!$avocat) {
            return self::sendError("Cet Avocat n'existe pas!", 404);
        };

        $avocat->delete($formData);
        return self::sendResponse($avocat, "Avocat   supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UNE CATEGORIE~###

    
}
