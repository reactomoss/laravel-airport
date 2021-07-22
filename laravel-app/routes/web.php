<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EncryptController;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    AdminController::class, 'index'
])->name('admin');


Auth::routes();

Route::get('/admin', [
    AdminController::class, 'index'
])->name('admin');

Route::get('form/{id}', [App\Http\Controllers\FormController::class, 'load'], function ($id) {
    return $id;
});
Route::post('form/submit', [App\Http\Controllers\FormController::class, 'submit']);
Route::post('form/saveConsulted', [App\Http\Controllers\FormController::class, 'saveConsulted']);
Route::post('form/findUser', [App\Http\Controllers\FormController::class, 'findUser']);
Route::get('downloadDoc/{projectId}/{type}/{id}/{name}',[App\Http\Controllers\FormController::class, 'downloadFile']);
Route::get('/getLoad', [
    App\Http\Controllers\SomDepartmentsController::class, 'getLoad'
])->name('getLoad');

Route::resource('cmsApiCustoms', App\Http\Controllers\CmsApiCustomController::class);

Route::resource('cmsApiKeys', App\Http\Controllers\CmsApiKeyController::class);

Route::resource('cmsLogs', App\Http\Controllers\CmsLogsController::class);

Route::resource('cmsStatisticComponents', App\Http\Controllers\CmsStatisticComponentsController::class);

Route::resource('cmsStatistics', App\Http\Controllers\CmsStatisticsController::class);

Route::resource('cmsUsers', App\Http\Controllers\CmsUsersController::class);

Route::resource('cmsSettings', App\Http\Controllers\CmsSettingsController::class);

Route::resource('cmsPrivilegesRoles', App\Http\Controllers\CmsPrivilegesRolesController::class);

Route::resource('cmsPrivileges', App\Http\Controllers\CmsPrivilegesController::class);

Route::resource('cmsModuls', App\Http\Controllers\CmsModulsController::class);

Route::resource('cmsMenusPrivileges', App\Http\Controllers\CmsMenusPrivilegesController::class);

Route::resource('cmsMenuses', App\Http\Controllers\CmsMenusController::class);

Route::resource('cmsEmailTemplates', App\Http\Controllers\CmsEmailTemplatesController::class);

Route::resource('cmsEmailQueues', App\Http\Controllers\CmsEmailQueuesController::class);

Route::resource('cmsDashboards', App\Http\Controllers\CmsDashboardController::class);

Route::resource('cmsUsers', App\Http\Controllers\CmsUsersController::class);

Route::resource('somApprovalsResponsibles', App\Http\Controllers\SomApprovalsResponsibleController::class);

Route::resource('somCountries', App\Http\Controllers\SomCountryController::class);

Route::resource('somCountryInfos', App\Http\Controllers\SomCountryInfoController::class);

Route::resource('somDepartments', App\Http\Controllers\SomDepartmentsController::class);

Route::resource('somDepartmentsUsers', App\Http\Controllers\SomDepartmentsUsersController::class);

Route::resource('somFormApprovals', App\Http\Controllers\SomFormApprovalsController::class);

Route::resource('somFormElements', App\Http\Controllers\SomFormElementsController::class);

Route::resource('somFormTasks', App\Http\Controllers\SomFormTasksController::class);

Route::resource('somForms', App\Http\Controllers\SomFormsController::class);

Route::resource('somMilestonesFormsTypes', App\Http\Controllers\SomMilestonesFormsTypesController::class);

Route::resource('somNews', App\Http\Controllers\SomNewsController::class);

Route::resource('somPhases', App\Http\Controllers\SomPhasesController::class);

Route::resource('somProjectsMilestones', App\Http\Controllers\SomProjectsMilestonesController::class);

Route::resource('somPhasesMilestonesTypes', App\Http\Controllers\SomPhasesMilestonesTypesController::class);

Route::resource('somProjectInfoStatuses', App\Http\Controllers\SomProjectInfoStatusController::class);

Route::resource('somProjectProcessTypes', App\Http\Controllers\SomProjectProcessTypeController::class);

Route::resource('somProjectUsers', App\Http\Controllers\SomProjectUsersController::class);

Route::resource('somProjects', App\Http\Controllers\SomProjectsController::class);

Route::resource('somProjectsAdditionalAirports', App\Http\Controllers\SomProjectsAdditionalAirportController::class);

Route::resource('somProjectsAdvisors', App\Http\Controllers\SomProjectsAdvisorsController::class);

Route::resource('somAirports', App\Http\Controllers\SomProjectsAirportController::class);

Route::resource('somProjectsAirports', App\Http\Controllers\SomProjectsAirportController::class);

Route::resource('somProjectsAirportTypes', App\Http\Controllers\SomProjectsAirportTypeController::class);

Route::resource('somProjectsAssetTypes', App\Http\Controllers\SomProjectsAssetTypeController::class);

Route::resource('somProjectsModels', App\Http\Controllers\SomProjectsModelController::class);

Route::resource('somProjectsPartners', App\Http\Controllers\SomProjectsPartnersController::class);

Route::resource('somProjectsPhases', App\Http\Controllers\SomProjectsPhasesController::class);

Route::resource('somProjectsPriorities', App\Http\Controllers\SomProjectsPriorityController::class);

Route::resource('somProjectsTransactionTypes', App\Http\Controllers\SomProjectsTransactionTypeController::class);

Route::resource('somStatuses', App\Http\Controllers\SomStatusController::class);

Route::resource('somStatusApprovals', App\Http\Controllers\SomStatusApprovalsController::class);

Route::get('/api/get_project', [App\Http\Controllers\ApiGetProjectController::class, 'index'])->name('get_project');

//new added for all delete ==============================================================
Route::delete('somProjectsDeleteAll', [App\Http\Controllers\SomProjectsController::class, 'deleteAll']);

Route::delete('somAirportsDeleteAll', [App\Http\Controllers\SomProjectsAirportController::class, 'deleteAll']);

Route::delete('somCountriesDeleteAll', [App\Http\Controllers\SomCountryController::class, 'deleteAll']);

Route::delete('somNewsDeleteAll', [App\Http\Controllers\SomNewsController::class, 'deleteAll']);

Route::delete('cmsUsersDeleteAll', [App\Http\Controllers\CmsUsersController::class, 'deleteAll']);

Route::delete('somDepartmentsDeleteAll', [App\Http\Controllers\SomDepartmentsController::class, 'deleteAll']);

Route::delete('somDepartmentsUsersDeleteAll', [App\Http\Controllers\SomDepartmentsUsersController::class, 'deleteAll']);

Route::delete('somProjectUsersDeleteAll', [App\Http\Controllers\SomProjectUsersController::class, 'deleteAll']);

Route::delete('somProjectsAdditionalAirportsDeleteAll', [App\Http\Controllers\SomProjectsAdditionalAirportController::class, 'deleteAll']);

Route::delete('somProjectsPartnersDeleteAll', [App\Http\Controllers\SomProjectsPartnersController::class, 'deleteAll']);

Route::delete('somProjectsAdvisorsDeleteAll', [App\Http\Controllers\SomProjectsAdvisorsController::class, 'deleteAll']);

Route::delete('somProjectsPhasesDeleteAll', [App\Http\Controllers\SomProjectsPhasesController::class, 'deleteAll']);

Route::delete('somProjectsMilestonesDeleteAll', [App\Http\Controllers\SomProjectsMilestonesController::class, 'deleteAll']);

Route::delete('somFormsDeleteAll', [App\Http\Controllers\SomFormsController::class, 'deleteAll']);

Route::delete('somFormTasksDeleteAll', [App\Http\Controllers\SomFormTasksController::class, 'deleteAll']);

Route::delete('somFormElementsDeleteAll', [App\Http\Controllers\SomFormElementsController::class, 'deleteAll']);

Route::delete('somFormApprovalsDeleteAll', [App\Http\Controllers\SomFormApprovalsController::class, 'deleteAll']);

Route::delete('somApprovalsResponsiblesDeleteAll', [App\Http\Controllers\SomApprovalsResponsibleController::class, 'deleteAll']);

Route::delete('somStatusApprovalsDeleteAll', [App\Http\Controllers\SomStatusApprovalsController::class, 'deleteAll']);

Route::delete('somCountryInfosDeleteAll', [App\Http\Controllers\SomCountryInfoController::class, 'deleteAll']);

Route::delete('cmsDashboardsDeleteAll', [App\Http\Controllers\CmsDashboardController::class, 'deleteAll']);
