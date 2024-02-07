<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PartiesType;
use Illuminate\Support\Facades\Validator;

class PARTIETYPE_HELPER extends BASE_HELPER
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
            "label.required" => "Le type de party  est réquis!",
            "description.required" => "La description du type de partie  est réquise!",
             
        ];
    }

    static function TypeCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createType($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        
        $user = PartiesType::create($formData); #ENREGISTREMENT DU TYPE DE PARTIE DANS LA DB

        return self::sendResponse($user, 'Type de partie ajoutée avec succès!!');
    }
    static function getType()
    {
        $category =  PartiesType::orderBy("id", "desc")->get();
        return self::sendResponse($category, 'Tout les types de partie récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN TYPE DE PARTIE##
    static function TypeRetrieve($id)
    {
        $category = PartiesType::find($id);
        if (!$category) {
            return self::sendError("Ce type de partie n'existe pas!", 404);
        }

        return self::sendResponse($category, "Type de partie récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN TYPE DE PARTIE ____~###
    static function updatetype($request, $id)
    {
        $formData = $request->all();
        $category = PartiesType::find($id);

        // return $user;
        if (!$category) {
            return self::sendError("Ce type de partie n'existe pas!", 404);
        };

        $category->update($formData);
        return self::sendResponse($category, "Votre type de partie a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UN TYPE DE PARTIE~###


    ##_____ FIN RETRIEVE D'UN TYPE DE PARTIE##
    static function deletetype($request, $id)
    {
        $formData = $request->all();

        $category = PartiesType::find($id);

        // return $user;
        if (!$category) {
            return self::sendError("Ce type de partie de partie n'existe pas!", 404);
        };

        $category->delete($formData);
        return self::sendResponse($category, "Votre  a été supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UN TYPE DE PARTIE~###

    
}
