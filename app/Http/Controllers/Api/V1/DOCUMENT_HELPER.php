<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Document;
use Illuminate\Support\Facades\Validator;

class DOCUMENT_HELPER extends BASE_HELPER
{
    static function add_rules(): array
    {
        return [
            "name" => ["required"],
            "titre" => ["required"],
            "file" => ["required"],
            "description" => ["required"],
            "category" => "required|integer",


        ];
    }

    static function add_messages(): array
    {
        return [
            "name.required" => "Le nom du document  est réquis!",
            "titre.required" => "Le titre du document  est réquis!",
            "description.required" => "La description du document  est réquise!",
            "file.required" => "Veillez choisir un document!",
            
            "category.required" => "La categorie  du document  est réquise!",
            'category.integer' => 'Le champ  doit être un entier',
           
             

             
        ];
    }        

    static function DocumentCreate_Validator($formDatas)
    {
        #
        $rules = self::add_rules();
        $messages = self::add_messages();

        $validator = Validator::make($formDatas, $rules, $messages);
        return $validator;
    }


    static function createDocument($request)
    {
        $formData = $request->all();
        $user = request()->user();
        // return $user->id; 
        $image = $request->file('file');
        $image_name = $image->getClientOriginalName();
        $image->move("documents", $image_name);
        $formData["file"] = asset("document/" . $image_name);

        $document = Document::create($formData); #ENREGISTREMENT DE LA CATEGORIE DANS LA DB

        return self::sendResponse($document, 'document ajoutée avec succès!!');
    }
    static function getDocument()
    {
        $document =  Document::orderBy("id", "desc")->get();
        return self::sendResponse($document, 'Tout les document récupérées avec succès!!');
    }
    ##_____RETRIEVE D'UN DOCCUMENT ##
    static function DocumentRetrieve($id)
    {
        $document = Document::find($id);
        if (!$document) {
            return self::sendError("Ce document n'existe pas!", 404);
        }

        return self::sendResponse($document, "document récupé avec succès:!!");
    }

    ##___MODIFICATION D'UN CATEGORIE ____~###
    static function updatedocument($request, $id)
    {
        $formData = $request->all();
        $document = Document::find($id);

        // return $user;
        if (!$document) {
            return self::sendError("Cette document n'existe pas!", 404);
        };
        
        ##TRAITEMENT DE L'IMAGEn
        if ($request->file('file')) {
            $image = $request->file('file');
            $image_name = $image->getClientOriginalName();
            $image->move("documents", $image_name);
            $formData["file"] = asset("documents/" . $image_name);
        }


        $document->update($formData);
        return self::sendResponse($document, "Votre document a été modifié avec succès ");
    }
    ##___ FIN MODIFICATION D'UNE CATEGORIE~###


    ##_____ FIN RETRIEVE D'UNE CATEGORIE##
    static function deletedocument($request, $id)
    {
        $formData = $request->all();

        $document = Document::find($id);

        // return $user;
        if (!$document) {
            return self::sendError("Ce document n'existe pas!", 404);
        };

        $document->delete($formData);
        return self::sendResponse($document, "Votre document a été supprimer avec succès ");
    }
    ##___FIN SUPPRESSION  D'UNE CATEGORIE~###

    
}
