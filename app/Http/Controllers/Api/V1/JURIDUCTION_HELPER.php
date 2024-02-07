<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Juridiction;
use Illuminate\Support\Facades\Validator;

class JURIDUCTION_HELPER extends BASE_HELPER
{
    static function add_rules(): array
    {
        return [
            "label" => ["required"],
            "description" => ["required"],


        ];
    }

    static function add_messages(): array
    {
        return [
            "label.required" => "Le nom de la juridiction  est réquise!",
            "description.required" => "La description de la juriduction  est réquise!",
             
        ];
    }

    static function JuridictionCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createJuridiction($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        
        $user = Juridiction::create($formData); #ENREGISTREMENT DE LA CATEGORIE DANS LA DB

        return self::sendResponse($user, 'juridiction ajoutée avec succès!!');
    }
    static function getJuridiction()
    {
        $category =  Juridiction::orderBy("id", "desc")->get();
        return self::sendResponse($category, 'Tout les juridictions récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN CATEGORIE DE PARTIE##
    static function JuridictionRetrieve($id)
    {
        $category = Juridiction::find($id);
        if (!$category) {
            return self::sendError("Cette categorie n'existe pas!", 404);
        }

        return self::sendResponse($category, "categorie récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN CATEGORIE ____~###
    static function updatejuridiction($request, $id)
    {
        $formData = $request->all();
        $category = Juridiction::find($id);

        // return $user;
        if (!$category) {
            return self::sendError("Cette juridiction n'existe pas!", 404);
        };

        $category->update($formData);
        return self::sendResponse($category, "Votre juridiction a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UNE CATEGORIE~###


    ##_____ FIN RETRIEVE D'UNE CATEGORIE##
    static function deletejuridiction($request, $id)
    {
        $formData = $request->all();

        $category = Juridiction::find($id);

        // return $user;
        if (!$category) {
            return self::sendError("Cette juridiction n'existe pas!", 404);
        };

        $category->delete($formData);
        return self::sendResponse($category, "Votre juridiction a été supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UNE CATEGORIE~###

    
}
