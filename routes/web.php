<?php

use App\Models\Logiciel;
use App\Models\Materiel;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogicielController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\MaintenanceController;

Route::get('/user', [UserController::class, 'create']);
Route::post('/new', [UserController::class, 'store']);

Route::get('/user/{id}/edit', [\App\Http\Controllers\UserController::class,'edit'])->name('edit');
Route::post('/user/{id}/edit', [\App\Http\Controllers\UserController::class, 'update']);

Route::get('/UserInsert', function () {
    return view('Projet.user');
})->name('user.insert');

Route::get('/edit', function () {
    return view('Projet.edit');
})->name('Projet.edit');

Route::delete('/Admin/{id}', [UserController::class, 'destroy']);
Route::get('/Admin', function () {
    return view('Projet.admin');
});
Route::get('/Admin', [UserController::class, 'showUser'])->name('admin');

//Login
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);

//index
Route::get('/index', function () {
    $mat = Materiel::all();
        $departements = Departement::all();
        $data = [];
        foreach ($departements as $departement) {
            $count = Materiel::where('departement_id', $departement->id)->count();
            $data[] = [
                'departement' => $departement,
                'count' => $count
            ];
        }
    return view('Projet.index', ['departement' => $departements, 'materiel' => $mat,'data' => $data]);
})->name('Projet.index');

Route::get('/er', function () {
    return view('Projet.index');
})->name('error');

// Bs
Route::get('/', function () {
    return view('welcome');
});

//Materiel
// Groupe de routes pour 'Materiel'
Route::prefix('/mat')->group(function () {
    Route::get('/', [MaterielController::class, 'create']);
    Route::post('/newMat', [MaterielController::class, 'store']);

    Route::get('/{id}/edit', [\App\Http\Controllers\MaterielController::class, 'edit'])->name('Matedit');
    Route::post('/{id}/edit', [\App\Http\Controllers\MaterielController::class, 'update']);

    Route::get('/matinsert', function () {
        $departements = Departement::all();
        return view('Projet.Materiel.insert', ['departements' => $departements]);
    })->name('Mat.insert');

    Route::get('/{id}/edit', function () {
        $departements = Departement::all();
        return view('Projet.Materiel.Matedit', ['departements' => $departements]);
    })->name('Mat.edit');

    Route::delete('/admin/{id}', [MaterielController::class, 'destroy']);
    Route::get('/admin', function () {
        return view('Projet.Materiel.admin');
    });

    Route::get('/', [MaterielController::class, 'showMateriel'])->name('Materiels');
});
//Departement
// Groupe de routes pour 'Departement'
Route::prefix('/dep')->group(function () {
    Route::get('/', [DepartementController::class, 'create']);
    Route::post('/newDep', [DepartementController::class, 'store']);

    Route::get('/{id}/edit', [\App\Http\Controllers\DepartementController::class, 'edit'])->name('Depedit');
    Route::post('/{id}/edit', [\App\Http\Controllers\DepartementController::class, 'update']);

    Route::get('/depinsert', function () {
        return view('Projet.Departement.insertDep');
    })->name('Dep.insert');

    Route::get('/{id}/edit', function () {
        return view('Projet.Departement.Depedit');
    })->name('Dep.edit');

    Route::delete('/admin/{id}', [DepartementController::class, 'destroy']);

    Route::get('/admin', function () {
    return view('Projet.Departement.departement');
    })->name('depart');

    Route::get('/', [DepartementController::class, 'showDepartement'])->name('Departement');
    });

// Groupe de routes pour 'Logiciel'
Route::prefix('/log')->group(function () {
    Route::get('/', [LogicielController::class, 'create']);
    Route::post('/newLog', [LogicielController::class, 'store']);

    Route::get('/{id}/edit', [\App\Http\Controllers\LogicielController::class, 'edit'])->name('Depedit');
    Route::post('/{id}/edit', [\App\Http\Controllers\LogicielController::class, 'update']);

    Route::get('/loginsert', function () {
        return view('Projet.Logiciel.insertLog');
    })->name('Log.insert');

    Route::get('/{id}/edit', function () {
        return view('Projet.Logiciel.Logedit');
    })->name('Log.edit');

    Route::delete('/admin/{id}', [LogicielController::class, 'destroy']);
    Route::get('/admin', function () {
        return view('Projet.Logiciel.admin');
    })->name('log');

    Route::get('/', [LogicielController::class, 'showLogiciel'])->name('Logiciel');
    });

// Groupe de routes pour 'Maintenance'
Route::prefix('/mai')->group(function () {
    Route::get('/', [MaintenanceController::class, 'create']);
    Route::post('/newMai', [MaintenanceController::class, 'store']);

    Route::get('/{id}/edit', [\App\Http\Controllers\MaintenanceController::class, 'edit'])->name('Maiedit');
    Route::post('/{id}/edit', [\App\Http\Controllers\MaintenanceController::class, 'update']);

    Route::get('/maiInsert', function () {
        $materiels = Materiel::all();
        $logiciels = Logiciel::all();
        return view('Projet.Maintenance.insertMain', ['materiels' => $materiels]);
    })->name('Mai.insert');

    Route::get('/{id}/edit', function () {
        $materiels = Materiel::all();
        return view('Projet.Maintenance.Maintedit', ['materiels' => $materiels]);
    })->name('Mai.edit');

    Route::delete('/admin/{id}', [MaintenanceController::class, 'destroy']);
    Route::get('/admin', function () {
        return view('Projet.Maintenance.admin');
    })->name('mai');

    Route::get('/', [MaintenanceController::class, 'showMaintenance'])->name('Maintenance');
    });
