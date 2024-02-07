<?php

use App\Http\Controllers\Api\V1\ActionController;
use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\DocumentCategoryController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\Authorization;
use App\Http\Controllers\Api\V1\AvocatController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CollaborateurController;
use App\Http\Controllers\Api\V1\DocumentController;
use App\Http\Controllers\Api\V1\DossierController;
use App\Http\Controllers\Api\V1\JuridictionController;
use App\Http\Controllers\Api\V1\PartieController;
use App\Http\Controllers\Api\V1\PartiesCategoryController;
use App\Http\Controllers\Api\V1\PartiesTypeController;
use App\Http\Controllers\Api\V1\ProfilController;
use App\Http\Controllers\Api\V1\RangController;
use App\Http\Controllers\Api\V1\RightController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    ###========== PROFILS ROUTINGS ========###
    Route::controller(ProfilController::class)->group(function () {
        Route::prefix('profil')->group(function () {
            Route::any('add', 'CreateProfil'); #AJOUT DE PROFIL
            Route::any('all', 'Profils'); #RECUPERATION DE TOUT LES PROFILS
            Route::any('{id}/retrieve', 'RetrieveProfil'); #RECUPERATION D'UN PROFIL
            Route::any('{id}/update', 'UpdateProfil'); #MODIFICATION D'UN PROFIL
            Route::any('{id}/delete', 'DeleteProfil'); #SUPPRESSION D'UN PROFIL
        });
    });

    ###========== RANG ROUTINGS ========###
    Route::controller(RangController::class)->group(function () {
        Route::prefix('rang')->group(function () {
            Route::any('add', 'CreateRang'); #AJOUT DE RANG
            Route::any('all', 'Rangs'); #RECUPERATION DE TOUT LES RANGS
            Route::any('{id}/retrieve', 'RetrieveRang'); #RECUPERATION D'UN RANG
            Route::any('{id}/delete', 'DeleteRang'); #SUPPRESSION D'UN RANG
            Route::any('{id}/update', 'UpdateRang'); #MODIFICATION D'UN RANG'
        });
    });

    ###========== ACTION ROUTINGS ========###
    Route::controller(ActionController::class)->group(function () {
        Route::prefix('action')->group(function () {
            Route::any('add', 'CreateAction'); #AJOUT D'UNE ACTION'
            Route::any('all', 'Actions'); #GET ALL ACTIONS
            Route::any('{id}/retrieve', 'RetrieveAction'); #RECUPERATION D'UNE ACTION
            Route::any('{id}/delete', 'DeleteAction'); #SUPPRESSION D'UNE ACTION
            Route::any('{id}/update', 'UpdateAction'); #MODIFICATION D'UNE ACTION
        });
    });

    ###========== RIGHTS ROUTINGS ========###
    Route::controller(RightController::class)->group(function () {
        Route::prefix('right')->group(function () {
            Route::any('add', 'CreateRight'); #AJOUT D'UN DROIT'
            Route::any('all', 'Rights'); #GET ALL RIGHTS
            Route::any('{id}/retrieve', 'RetrieveRight'); #RECUPERATION D'UN DROIT
            Route::any('{id}/delete', 'DeleteRight'); #SUPPRESSION D'UN DROIT
            Route::any('{id}/update', 'UpdateRight'); #MODIFICATION D'UNE ACTION

        });
    });

    ###========== USERs ROUTINGS ========###
    Route::prefix('user')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::any('add', 'AddUser');
            Route::any('login', 'Login');
            Route::middleware(['auth:api'])->get('logout', 'Logout');
            Route::any('all', 'Users');
            Route::any('{id}/retrieve', 'RetrieveUser');
            Route::any('{id}/password/update', 'UpdatePassword');
        });
    });

    ###========== Admin ROUTINGS ========###
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::any('add', 'AddAdmin');
            Route::any('all', 'Admins');
            Route::any('{id}/retrieve', 'RetrieveAdmins');
            Route::any('{id}/update', 'UpdateAdmins');
            Route::any('{id}/delete', 'AdminDelete');
        });
    });


    ###========== DOSSIER CATEGORY ROUTINGS ========###
    Route::controller(CategoryController::class)->group(function () {
        Route::prefix('categories')->group(function () {
            Route::any('add', 'CategoryCreate'); #AJOUT DE PRODUITS
            Route::any('all', 'Category'); #GET ALL PAYS
            Route::any('{id}/retrieve', '_CategoryRetrieve'); #RECUPERATION D'UN VILLES
            Route::any('{id}/update', '_UpdateCategory'); #MODIFICATION DE VILLES
            Route::any('{id}/delete', '_DeleteCategory'); #SUPPRESSION DE VILLES

        });
    });
    ###========== DOSSIER CATEGORY ROUTINGS ========###
    Route::controller(DocumentCategoryController::class)->group(function () {
        Route::prefix('doccat')->group(function () {
            Route::any('add', 'DocumentcatCreate'); #AJOUT DE PRODUITS
            Route::any('all', 'Documentcat'); #GET ALL PAYS
            Route::any('{id}/retrieve', '_DocumentcatRetrieve'); #RECUPERATION D'UN VILLES
            Route::any('{id}/update', '_UpdateDocumentcat'); #MODIFICATION DE VILLES
            Route::any('{id}/delete', '_DeleteDocumentcat'); #SUPPRESSION DE VILLES
        });
    });

    ###========== AVOCATS  ROUTINGS ========###
    Route::controller(AvocatController::class)->group(function () {
        Route::prefix('avocat')->group(function () {
            Route::any('add', 'AvocatCreate'); #AJOUT DE CATEGORY
            Route::any('all', 'Avocat'); #GET ALL CATEGORIES
            Route::any('{id}/retrieve', '_AvocatRetrieve'); #RECUPERATION D'UN CATEGORY
            Route::any('{id}/update', '_UpdateAvocat'); #MODIFICATION DE LA CATEGORY
            Route::any('{id}/delete', '_DeleteAvocat'); #SUPPRESSION DE LA CATEGORY
        });
    });


    ###========== PARTIES  ROUTINGS ========###
    Route::controller(PartieController::class)->group(function () {
        Route::prefix('partie')->group(function () {
            Route::any('add', 'PartieCreate'); #AJOUT DE CATEGORY
            Route::any('all', 'Partie'); #GET ALL CATEGORIES
            Route::any('{id}/retrieve', '_PartieRetrieve'); #RECUPERATION D'UN CATEGORY
            Route::any('{id}/update', '_UpdatePartie'); #MODIFICATION DE LA CATEGORY
            Route::any('{id}/delete', '_DeletePartie'); #SUPPRESSION DE LA CATEGORY
        });
    });



    ###========== DOCUMENT  ROUTINGS ========###
    Route::controller(DocumentController::class)->group(function () {
        Route::prefix('document')->group(function () {
            Route::any('add', 'DocumentCreate'); #AJOUT DE DOCUMENT
            Route::any('all', 'Document'); #GET ALL CATEGORIES
            Route::any('{id}/retrieve', '_DocumentRetrieve'); #RECUPERATION D'UN DOCUMENT
            Route::any('{id}/update', '_UpdateDocument'); #MODIFICATION DU DOCUMENT
            Route::any('{id}/delete', '_DeleteDocument'); #SUPPRESSION DU DOCCUMENT
        });
    });


    ###========== COLLABORATEUR  ROUTINGS ========###
    Route::controller(CollaborateurController::class)->group(function () {
        Route::prefix('collaborateur')->group(function () {
            Route::any('add', 'CollaborateurCreate'); #AJOUT DE CATEGORY
            Route::any('all', 'Collaborateur'); #GET ALL CATEGORIES
            Route::any('{id}/retrieve', '_CollaborateurRetrieve'); #RECUPERATION D'UN CATEGORY
            Route::any('{id}/update', '_UpdateCollaborateur'); #MODIFICATION DE LA CATEGORY
            Route::any('{id}/delete', '_DeleteCollaborateur'); #SUPPRESSION DE LA CATEGORY
        });
    });


    ###========== PARTIES CATEGORY ROUTINGS ========###
    Route::controller(PartiesCategoryController::class)->group(function () {
        Route::prefix('categories')->group(function () {
            Route::any('add', 'CategoryCreate'); #AJOUT DE CATEGORY
            Route::any('all', 'Category'); #GET ALL CATEGORIES
            Route::any('{id}/retrieve', '_CategoryRetrieve'); #RECUPERATION D'UN CATEGORY
            Route::any('{id}/update', '_UpdateCategory'); #MODIFICATION DE LA CATEGORY
            Route::any('{id}/delete', '_DeleteCategory'); #SUPPRESSION DE LA CATEGORY
        });
    });

    ###========== PARTIES TYPE ROUTINGS ========###
    Route::controller(PartiesTypeController::class)->group(function () {
        Route::prefix('type')->group(function () {
            Route::any('add', 'TypeCreate'); #AJOUT DU TYPE DE PARTIE
            Route::any('all', 'Types'); #GET ALL TYPE DE PARTIE
            Route::any('{id}/retrieve', '_TypeRetrieve'); #RECUPERATION DU TYPE DE PARTIE
            Route::any('{id}/update', '_UpdateType'); #MODIFICATION DU TYPE DE PARTIE
            Route::any('{id}/delete', '_DeleteType'); #SUPPRESSION DU TYPE DE PARTIE
        });
    });

    ###========== JURIDICTION  ROUTINGS ========###
    Route::controller(JuridictionController::class)->group(function () {
        Route::prefix('juridiction')->group(function () {
            Route::any('add', 'JuridictionCreate'); #AJOUT DE JURIDICTION
            Route::any('all', 'Juridiction'); #GET ALL TYPE DE PARTIE
            Route::any('{id}/retrieve', '_JuridictionRetrieve'); #RECUPERATION DU TYPE DE PARTIE
            Route::any('{id}/update', '_UpdateJuridiction'); #MODIFICATION DU TYPE DE PARTIE
            Route::any('{id}/delete', '_DeleteJuridiction'); #SUPPRESSION DU TYPE DE PARTIE
        });
    });


    ###========== DOSSIER ROUTINGS ========###
    Route::prefix('dossier')->group(function () {
        Route::controller(DossierController::class)->group(function () {
            Route::any('add', 'DossierCreate');
            Route::any('all', '_Dossiers');
            Route::any('{id}/update', 'Update');
            Route::any('{id}/delete', 'Delete');
            Route::any('/{id}/retrieve', 'Retrieve');
            Route::any('{id}/affect', 'AffectToDossier');
            Route::any('{id}/affectavocat', 'AffectToAvocat');
            Route::any('{id}/affectcollaborateur', 'AffectToCollaborateur');
            Route::any('{id}/affectdocument', '_AffectDocument');
        });
    });


    Route::any('authorization', [Authorization::class, 'Authorization'])->name('authorization');
});
