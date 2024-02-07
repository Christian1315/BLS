<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class DossierController extends DOSSIER_HELPER
{
    #VERIFIONS SI LE USER EST AUTHENTIFIE
    public function __construct()
    {
        $this->middleware(['auth:api', 'scope:api-access']);
    }

   function DossierCreate(Request $request)
   {
       #VERIFICATION DE LA METHOD
       if ($this->methodValidation($request->method(), "POST") == False) {
           #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
           return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
       };
      
       #VALIDATION DES DATAs DEPUIS LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
       $validator = $this->DossierCreate_Validator($request->all());

       if ($validator->fails()) {
           #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
           return $this->sendError($validator->errors(), 404);
       }

       #ENREGISTREMENT DANS LA DB VIA **createProduct** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
       return $this->createDossier($request);
   }


    #RECUPERATION DE TOUT LES CLIENTS
    public function _Dossiers(Request $request)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "GET") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR CLIENT_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };

        #RETOURNE TOUTES LES CLIENTS
        return $this->getdossier();
    }

    #RECUPERATION D'UN CLIENT
    public function Retrieve(Request $request, $id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "GET") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR CLIENT_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };

        return $this->retrieveDossier($id);
    }

    

    #MODIFICATION D'UN CLIENT
    public function Update(Request $request, $id)
    {

        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "POST") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR Transaction_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };

        return $this->updateDossier($request, $id);
    }

    #SUPPRESSION D'UN CLIENT
    public function Delete(Request $request, $id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "DELETE") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR Transaction_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };
        return $this->deleteDossier($id);
    }
    function AffectToDossier(Request $request,$id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "POST") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };
 
        #RECUPERATION D'UN PRODUIT VIA SON **id**
        return $this->affectDossier($request,$id);
    }

    function AffectToAvocat(Request $request,$id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "POST") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };
 
        #RECUPERATION D'UN PRODUIT VIA SON **id**
        return $this->affectAvocat($request,$id);
    }
    function AffectToCollaborateur(Request $request,$id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "POST") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };
 
        #RECUPERATION D'UN PRODUIT VIA SON **id**
        return $this->affectCollaborateur($request,$id);
    }
    function _AffectDocument(Request $request,$id)
    {
        #VERIFICATION DE LA METHOD
        if ($this->methodValidation($request->method(), "POST") == False) {
            #RENVOIE D'ERREURE VIA **sendError** DE LA CLASS BASE_HELPER HERITEE PAR USER_HELPER
            return $this->sendError("La methode " . $request->method() . " n'est pas supportée pour cette requete!!", 404);
        };
 
        #RECUPERATION D'UN PRODUIT VIA SON **id**
        return $this->affectDocument($request,$id);
    }
}
