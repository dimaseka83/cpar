<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\Api\QualityController;
use App\Http\Controllers\Api\ContactsController;
use App\Http\Controllers\Api\PerusahaanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Home
Route::prefix('/postHome')->group(function ()
{
    Route::post('/slides', [HomeController::class, 'postSlides']);
    Route::post('/slidesDelete', [HomeController::class, 'postSlidesDelete']);
    Route::post('/images_slides', [HomeController::class, 'postImagesSlides']);
    Route::post('/images_slidesDelete', [HomeController::class, 'postImagesSlidesDelete']);
    Route::post('/page2', [HomeController::class, 'postPage2']);
    Route::post('/page2Delete', [HomeController::class, 'page2Delete']);
    Route::post('/page3', [HomeController::class, 'postPage3']);
    Route::post('/page3Delete', [HomeController::class, 'page3Delete']);
    Route::post('/sub_page3', [HomeController::class, 'postSubpage3']);
    Route::post('/sub_page3Delete', [HomeController::class, 'subpage3Delete']);
    Route::post('/page4', [HomeController::class, 'postPage4']);
    Route::post('/page4Delete', [HomeController::class, 'page4Delete']);
    Route::post('/services', [HomeController::class, 'postServices']);
    Route::post('/servicesDelete', [HomeController::class, 'postServicesDelete']);
    Route::post('/progress', [HomeController::class, 'postProgress']);
    Route::post('/progressDelete', [HomeController::class, 'postProgressDelete']);
    Route::post('/page5', [HomeController::class, 'postPage5']);
    Route::post('/page5Delete', [HomeController::class, 'page5Delete']);
    Route::post('/sub_page5', [HomeController::class, 'postSubpage5']);
    Route::post('/page6', [HomeController::class, 'postPage6']);
    Route::post('/page6Delete', [HomeController::class, 'page6Delete']);
    Route::post('/sub_page6', [HomeController::class, 'postSubpage6']);
    Route::post('/sub_page6Delete', [HomeController::class, 'subpage6Delete']);
    Route::post('/page7', [HomeController::class, 'postPage7']);
    Route::post('/page7Delete', [HomeController::class, 'page7Delete']);
    Route::post('/news', [HomeController::class, 'postNews']);
    Route::post('/newsDelete', [HomeController::class, 'postNewsDelete']);
});

// about
Route::prefix('/postAbout')->group(function ()
{
    Route::get('/missionKhusus', [AboutController::class, 'getMissionKhusus']);
    Route::get('/mission_contentKhusus', [AboutController::class, 'getMissionContentKhusus']);
    Route::post('/mission', [AboutController::class, 'postMission']);
    Route::post('/missionDelete', [AboutController::class, 'postMissionDelete']);
    Route::post('/mission_content', [AboutController::class, 'postMissionContent']);
    Route::post('/mission_contentDelete', [AboutController::class, 'postMissionContent']);
    Route::post('/products', [AboutController::class, 'postProducts']);
    Route::post('/percentage_products', [AboutController::class, 'postPercentageProducts']);
    Route::post('/team', [AboutController::class, 'postTeam']);
    Route::post('/team_details', [AboutController::class, 'postTeamDetails']);
    Route::post('/about_ceo', [AboutController::class, 'postAboutCeo']);
});

// offer
Route::prefix('/postOffer')->group(function ()
{
    Route::post('/offer', [OfferController::class, 'postOffer']);
    Route::post('/offer_prd', [OfferController::class, 'postOfferPrd']);
    Route::post('/offer_penawaran', [OfferController::class, 'postOfferPenawaran']);
    Route::post('/page3', [OfferController::class, 'postPage3']);
    Route::post('/sub_page3', [OfferController::class, 'postSubpage3']);
    Route::post('/page4', [OfferController::class, 'postPage4']);
    Route::post('/sub_page5', [OfferController::class, 'postSubpage5']);
    Route::post('/page6', [OfferController::class, 'postPage6']);
    Route::post('/sub_page6', [OfferController::class, 'postSubpage6']);
});

// Quality
Route::prefix('/postQuality')->group(function ()
{
    Route::post('/partner_logo', [QualityController::class, 'postPartnerLogo']);
    Route::post('/our_social', [QualityController::class, 'postOurSocial']);
    Route::post('/ourcertifications', [QualityController::class, 'postOurCertifications']);
    Route::post('/certification_logo', [QualityController::class, 'postCertificationLogo']);
    Route::post('/certification', [QualityController::class, 'postCertification']);
    Route::post('/strictpage', [QualityController::class, 'postStrictpage']);
    Route::post('/strict_logo', [QualityController::class, 'postStrictLogo']);
    Route::post('/headqc', [QualityController::class, 'postHeadqc']);
    Route::post('/heademail', [QualityController::class, 'postHeademail']);
});

// Contacts
Route::prefix('/postContacts')->group(function ()
{
    Route::post('/officeinf', [ContactsController::class, 'postOfficeInf']);
    Route::post('/companyinf', [ContactsController::class, 'postCompanyInf']);
    Route::post('/billinginf', [ContactsController::class, 'postBillingInf']);
    Route::post('/registration', [ContactsController::class, 'postRegistration']);
    Route::post('/vat', [ContactsController::class, 'postVat']);
    Route::post('/databox', [ContactsController::class, 'postDatabox']);
    Route::post('/additional', [ContactsController::class, 'postAdditional']);
    Route::post('/phone', [ContactsController::class, 'postPhone']);
    Route::post('/name_bank', [ContactsController::class, 'postNameBank']);
    Route::post('/contact_title', [ContactsController::class, 'postContactTitle']);
    
});

// Perusahaan
Route::prefix('/postCompany')->group(function ()
{
    Route::post('/perusahaan', [PerusahaanController::class, 'postPerusahaan']);
    Route::post('/contact', [PerusahaanController::class, 'postContact']);
    Route::post('/social_media', [PerusahaanController::class, 'postSocialMedia']);
    Route::post('/detailFooter', [PerusahaanController::class, 'postDetailFooter']);
});

Route::prefix('/postLaporan')->group(function ()
{
    Route::post('/laporan', [LaporanController::class, 'postLaporan']);
});