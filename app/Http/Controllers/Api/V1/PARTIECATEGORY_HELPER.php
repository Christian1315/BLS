<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PartiesCategory;
use Illuminate\Support\Facades\Validator;

class PARTIECATEGORY_HELPER extends BASE_HELPER
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
            "label.required" => "Le nom de la catégorie  est réquise!",
            "description.required" => "La descriptionde la catégorie  est réquise!",
             
        ];
    }

    static function CategoryCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createCategory($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        
        $user = PartiesCategory::create($formData); #ENREGISTREMENT DE LA CATEGORIE DANS LA DB

        return self::sendResponse($user, 'Catégorie ajoutée avec succès!!');
    }
    static function getCategory()
    {
        $category =  PartiesCategory::orderBy("id", "desc")->get();
        return self::sendResponse($category, 'Tout les categories récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN CATEGORIE DE PARTIE##
    static function CategoryRetrieve($id)
    {
        $category = PartiesCategory::find($id);
        if (!$category) {
            return self::sendError("Cette categorie n'existe pas!", 404);
        }

        return self::sendResponse($category, "categorie récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN CATEGORIE ____~###
    static function updatecategory($request, $id)
    {
        $formData = $request->all();
        $category = PartiesCategory::find($id);

        // return $user;
        if (!$category) {
            return self::sendError("Cette catégorie n'existe pas!", 404);
        };

        $category->update($formData);
        return self::sendResponse($category, "Votre catégorie a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UNE CATEGORIE~###


    ##_____ FIN RETRIEVE D'UNE CATEGORIE##
    static function deletecategory($request, $id)
    {
        $formData = $request->all();

        $category = PartiesCategory::find($id);

        // return $user;
        if (!$category) {
            return self::sendError("Cette catégorie n'existe pas!", 404);
        };

        $category->delete($formData);
        return self::sendResponse($category, "Votre catégorie a été supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UNE CATEGORIE~###

    
}
