<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\Type_maintenanceController;
use App\Http\Controllers\MaintenanceController;

use App\Models\Affectation;
use App\Models\Chauffeur;
use App\Models\Mission;
use App\Models\Vehicule;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');
Route::get('/', [DashboardController::class, 'index'])->name('home');

/* Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); */
//MARQUES
Route::get('/marques', [MarqueController::class, 'list'])->name('marques.list');
// Afficher le formulaire de création d'une nouvelle marque
Route::get('/formulaire', [MarqueController::class, 'formulaire'])->name('marques.formulaire');
// Enregistrer une nouvelle marque
Route::post('/marques', [MarqueController::class, 'store'])->name('marques.store');
// Afficher une seule marque
Route::get('/detail', [MarqueController::class, 'detail'])->name('marques.detail');
// Afficher le formulaire de modification d'une marque
Route::get('/edit{marque}', [MarqueController::class, 'edit'])->name('marques.edit');
// Mettre à jour une marque existante
Route::put('/update{marque}', [MarqueController::class, 'update'])->name('marques.update');
// Supprimer une marque
Route::delete('/marques/{marque}', [MarqueController::class, 'destroy'])->name('marques.destroy');
// export
Route::get('/export/pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');
Route::get('/export/excel', [ExportController::class, 'exportExcel'])->name('export.excel');
// MODELES
Route::get('/modeles', [ModeleController::class, 'list'])->name('modeles.list');
Route::get('/formulaire', [ModeleController::class, 'formulaire'])->name('modeles.formulaire');
Route::post('/modeles', [ModeleController::class, 'store'])->name('modeles.store');
Route::get('/detail', [ModeleController::class, 'detail'])->name('modeles.detail');
Route::get('/edit/{modele}', [ModeleController::class, 'edit'])->name('modeles.edit');
Route::put('/update/{modele}', [ModeleController::class, 'update'])->name('modeles.update');
Route::delete('/modeles/{modele}', [ModeleController::class, 'destroy'])->name('modeles.destroy');
// SERVICES 
Route::get('/services', [ServiceController::class, 'list'])->name('services.list');
Route::get('/formulaire', [ServiceController::class, 'formulaire'])->name('services.formulaire');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/detail', [ServiceController::class, 'detail'])->name('services.detail');
Route::get('/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/update', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
// PRESTATAIRES
Route::get('/prestataires', [PrestataireController::class, 'list'])->name('prestataires.list');
Route::get('/formulaire', [PrestataireController::class, 'formulaire'])->name('prestataires.formulaire');
Route::post('/prestataires', [PrestataireController::class, 'store'])->name('prestataires.store');
Route::get('/detail', [PrestataireController::class, 'detail'])->name('prestataires.detail');
Route::get('/prestataires/edit/{prestataire}', [PrestataireController::class, 'edit'])->name('prestataires.edit');
Route::put('/prestataires/update/{prestataire}', [PrestataireController::class, 'update'])->name('prestataires.update');
Route::delete('/prestataires/{prestataire}', [PrestataireController::class, 'destroy'])->name('prestataires.destroy');
//VEHICULES
Route::get('/vehicules', [VehiculeController::class, 'list'])->name('vehicules.list');
Route::get('vehicules/formulaire', [VehiculeController::class, 'formulaire'])->name('vehicules.formulaire');
Route::post('/vehicules', [VehiculeController::class, 'store'])->name('vehicules.store');
Route::get('vehicules/detail', [VehiculeController::class, 'detail'])->name('vehicules.detail');
Route::get('vehicules/edit/{vehicule}', [VehiculeController::class, 'edit'])->name('vehicules.edit');
Route::put('vehicules/update/{vehicule}', [VehiculeController::class, 'update'])->name('vehicules.update');
Route::delete('/vehicules/{vehicule}', [VehiculeController::class, 'destroy'])->name('vehicules.destroy');
//AFFECTATIONS
Route::get('/affectations', [AffectationController::class, 'list'])->name('affectations.list');
Route::get('/formulaire', [AffectationController::class, 'create'])->name('affectations.formulaire');
Route::post('/affectations', [AffectationController::class, 'store'])->name('affectations.store');
Route::get('/detail', [AffectationController::class, 'detail'])->name('affectations.detail');
Route::get('affectations/edit/{affectation}', [AffectationController::class, 'edit'])->name('affectations.edit');
Route::put('affectations/update/{affectation}', [AffectationController::class, 'update'])->name('affectations.update');
Route::delete('/affectations/{affectation}', [AffectationController::class, 'destroy'])->name('affectations.destroy');

//Chauffeurs
Route::get('/chauffeurs', [ChauffeurController::class, 'list'])->name('chauffeurs.list');
Route::get('chauffeurs/formulaire', [ChauffeurController::class, 'formulaire'])->name('chauffeurs.formulaire');
Route::post('/chauffeurs', [ChauffeurController::class, 'store'])->name('chauffeurs.store');
Route::get('chauffeurs/detail', [ChauffeurController::class, 'detail'])->name('chauffeurs.detail');
Route::get('/edit{chauffeur}', [ChauffeurController::class, 'edit'])->name('chauffeurs.edit');
Route::put('/update{chauffeur}', [ChauffeurController::class, 'update'])->name('chauffeurs.update');
Route::delete('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'destroy'])->name('chauffeurs.destroy');
//MISSIONS
Route::get('/missions', [MissionController::class, 'list'])->name('missions.list');
Route::get('missions/formulaire', [MissionController::class, 'formulaire'])->name('missions.formulaire');
Route::post('/missions', [MissionController::class, 'store'])->name('missions.store');
Route::get('missions/detail', [MissionController::class, 'detail'])->name('missions.detail');
Route::get('missions/edit/{mission}', [MissionController::class, 'edit'])->name('missions.edit');
Route::put('missions/update{mission}', [MissionController::class, 'update'])->name('missions.update');
Route::delete('/missions/{mission}', [MissionController::class, 'destroy'])->name('missions.destroy');
//TYPE MAINTENANCE
Route::get('/type_maintenances', [Type_maintenanceController::class, 'list'])->name('type_maintenances.list');
Route::post('/type_maintenances', [Type_maintenanceController::class, 'store'])->name('type_maintenances.store');
Route::get('type_maintenances/edit/{type_maintenance}', [Type_maintenanceController::class, 'edit'])->name('type_maintenances.edit');
Route::put('type_maintenances/update/{id_type_maintenance}', [Type_maintenanceController::class, 'update'])->name('type_maintenances.update');
Route::delete('/type_maintenances/{type_maintenance}', [Type_maintenanceController::class, 'destroy'])->name('type_maintenances.destroy');
//MAINTENANCES
Route::get('/maintenances', [MaintenanceController::class, 'list'])->name('maintenances.list');
Route::get('maintenances/formulaire', [MaintenanceController::class, 'formulaire'])->name('maintenances.formulaire');
Route::post('/maintenances', [MaintenanceController::class, 'store'])->name('maintenances.store');
Route::get('maintenances/detail', [MaintenanceController::class, 'detail'])->name('maintenances.detail');
Route::get('maintenances/edit/{maintenance}', [MaintenanceController::class, 'edit'])->name('maintenances.edit');
Route::put('maintenances/update{maintenance}', [MaintenanceController::class, 'update'])->name('maintenances.update');
Route::delete('/maintenances{maintenance}', [MaintenanceController::class, 'destroy'])->name('maintenances.destroy');


