<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\DocumentCategory;
use App\Models\PartiesCategory;
use Illuminate\Support\Facades\Validator;

class DOCUMENTCATEGORY_HELPER extends BASE_HELPER
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

    static function DocumentcatCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createDocumentcat($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        
        $user = DocumentCategory::create($formData); #ENREGISTREMENT DE LA CATEGORIE DANS LA DB

        return self::sendResponse($user, 'Catégorie ajoutée avec succès!!');
    }
    static function getDocumentcat()
    {
        $doccategory =  DocumentCategory::orderBy("id", "desc")->get();
        return self::sendResponse($doccategory, 'Tout les categories récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN CATEGORIE DE PARTIE##
    static function DocumentcatRetrieve($id)
    {
        $doccategory = DocumentCategory::find($id);
        if (!$doccategory) {
            return self::sendError("Cette categorie n'existe pas!", 404);
        }

        return self::sendResponse($doccategory, "categorie récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN CATEGORIE ____~###
    static function updatedocumentcat($request, $id)
    {
        $formData = $request->all();
        $doccategory = DocumentCategory::find($id);

        // return $user;
        if (!$doccategory) {
            return self::sendError("Cette catégorie n'existe pas!", 404);
        };

        $doccategory->update($formData);
        return self::sendResponse($doccategory, "Votre catégorie a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UNE CATEGORIE~###


    ##_____ FIN RETRIEVE D'UNE CATEGORIE##
    static function deletedocumentcat($request, $id)
    {
        $formData = $request->all();

        $doccategory = DocumentCategory::find($id);

        // return $user;
        if (!$doccategory) {
            return self::sendError("Cette catégorie n'existe pas!", 404);
        };

        $doccategory->delete($formData);
        return self::sendResponse($doccategory, "Votre catégorie a été supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UNE CATEGORIE~###

    
}
