<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class PartieController extends PARTIE_HELPER
{
    #VERIFIONS SI LE USER EST AUTHENTIFIE
    public function __construct()
    {
        $this->middleware(['auth:api', 'scope:api-access']);
        
        }

    
    #AJOUT D'UN CATEGORY 
    function PartieCreate(Request $request)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "POST") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };
       
        #VALIDATION DES DATAs DEPUIS LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
        $validator = $this->PartieCreate_Validator($request->all());

        if ($validator->fails()) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError($validator->errors(), 404);
        }

        #ENREGISTREMENT DANS LA DB VIA **createProduct** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
        return $this->createPartie($request);
    }

    #GET ALL PRODUCTS
    function Partie(Request $request)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "GET") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };

        #RECUPERATION DE TOUT LES PRODUITS  AVEC LEUR UTISATEUR
        return $this->getPartie();
    }
    function _PartieRetrieve(Request $request, $id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "GET") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };

        #RECUPERATION D'UN PAYS VIA SON **id**
        return $this->Partieretrieve($id);
    }
   #MODIFIER UN PRODUIT
   function _UpdatePartie(Request $request,$id)
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
       return $this->updatepartie($request,$id);
   }
   #SUPPRIMER UN PRODUIT
     function _DeletePartie(Request $request,$id)
   {
       #VERIFICATION DE LA METHOD
       if ($this->methodValidation($request->method(), "POST") == False) {
           #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
           return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
       };

       #RECUPERATION D'UN PRODUIT VIA SON **id**
       return $this->deletepartie($request,$id);
   }
   
   
  
}
