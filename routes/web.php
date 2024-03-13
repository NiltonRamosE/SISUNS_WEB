<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
/* ======== Ruta principal ======== */
Route::get('/', [MainController::class, 'index'])->name('inicio');
Route::get('/proyecto/{id}',[MainController::class, 'goToProyecto'])->name('proyecto');
Route::get('/noticia/{id}',[MainController::class, 'goToNoticia'])->name('noticia');
/* ======== Ruta Administrador ======== */
Route::get('/administrador/inicio', [AdminController::class, 'index'])->name('administrador.inicio');

Route::get('/administrador/noticias', [AdminController::class, 'goToNoticias'])->name('administrador.noticias');

Route::get('/administrador/proyectos', [AdminController::class, 'goToProyectos'])->name('administrador.proyectos');

Route::get('/administrador/integrantes', [AdminController::class, 'goToIntegrantes'])->name('administrador.integrantes');

//LOGIN
Route::get('/administrador/login', [LoginController::class, 'goToLogin'])->name('administrador.login');
Route::post('/administrador/logininiciar', [LoginController::class, 'login'])->name('administrador.validar');
Route::post('/administrador/logout', [LoginController::class, 'logOut'])->name('administrador.logOut');

// CREATE

Route::post('/administrador/save_img_carrusel', [AdminController::class, 'createImgCarrusel'])->name('administrador.save_img_carrusel');

Route::post('/administrador/save_proyecto', [AdminController::class, 'createProyecto'])->name('administrador.save_proyecto');

Route::post('/administrador/save_miembro', [AdminController::class, 'createMiembro'])->name('administrador.save_miembro');

Route::post('/administrador/save_noticia', [AdminController::class, 'createNoticia'])->name('administrador.save_noticia');
//UPDATE

Route::post('/administrador/update_proyecto/{id}', [AdminController::class, 'updateProyecto'])->name('administrador.update_proyecto');
Route::post('/administrador/update_miembro/{id}', [AdminController::class, 'updateMiembro'])->name('administrador.update_miembro');
Route::post('/administrador/update_noticia/{id}', [AdminController::class, 'updateNoticia'])->name('administrador.update_noticia');

Route::get('/administrador/update_proyecto_prioridad/{id}', [AdminController::class, 'updatePrioridadProyecto'])->name('administrador.update_proyecto_prioridad');
//DELETE

Route::get('/administrador/delete_proyecto/{id}', [AdminController::class, 'destroyProyecto'])->name('administrador.delete_proyecto');
Route::get('/administrador/delete_miembro/{id}', [AdminController::class, 'destroyMiembro'])->name('administrador.delete_miembro');
Route::get('/administrador/delete_noticia/{id}', [AdminController::class, 'destroyNoticia'])->name('administrador.delete_noticia');



