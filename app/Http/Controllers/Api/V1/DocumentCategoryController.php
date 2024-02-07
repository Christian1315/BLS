<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class DocumentCategoryController extends DOCUMENTCATEGORY_HELPER
{
    #VERIFIONS SI LE USER EST AUTHENTIFIE
    public function __construct()
    {
        $this->middleware(['auth:api', 'scope:api-access']);
        
        }

    
    #AJOUT D'UN CATEGORY 
    function DocumentcatCreate(Request $request)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "POST") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };
       
        #VALIDATION DES DATAs DEPUIS LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
        $validator = $this->DocumentcatCreate_Validator($request->all());

        if ($validator->fails()) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError($validator->errors(), 404);
        }

        #ENREGISTREMENT DANS LA DB VIA **createProduct** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
        return $this->createDocumentcat($request);
    }

    #GET ALL PRODUCTS
    function Documentcat(Request $request)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "GET") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };

        #RECUPERATION DE TOUT LES PRODUITS  AVEC LEUR UTISATEUR
        return $this->getDocumentcat();
    }
    function _DocumentcatRetrieve(Request $request, $id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "GET") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };

        #RECUPERATION D'UN PAYS VIA SON **id**
        return $this->documentretrieve($id);
    }
   #MODIFIER UN PRODUIT
   function _UpdateDocumentcat(Request $request,$id)
   {
       #VERIFICATION DE LA METHOD
       if ($this->methodValidation($request->method(), "POST") == False) {
           #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
           return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
       };

    //    #VALIDATION DES DATAs DEPUIS LA CLASS USER_HELPER
    //    $validator = $this->NEW_PRODUCT_Validator($request->all());
    //    if ($validator->fails()) {
    //        #RENVOIE D'ERREURE VIA **sendResponse** DE LA CLASS PRODUCT_HELPER
    //        return $this->sendError($validator->errors(), 404);
    //    }

       #RECUPERATION D'UN PRODUIT VIA SON **id**
       return $this->updatedocumentcat($request,$id);
   }
   #SUPPRIMER UN PRODUIT
     function _Deletedocumentcat(Request $request,$id)
   {
       #VERIFICATION DE LA METHOD
       if ($this->methodValidation($request->method(), "POST") == False) {
           #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
           return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
       };

       #RECUPERATION D'UN PRODUIT VIA SON **id**
       return $this->deletedocumentcat($request,$id);
   }
   
   
  
}
