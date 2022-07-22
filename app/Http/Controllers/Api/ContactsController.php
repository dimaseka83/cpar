<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\vat;
use App\Models\phone;
use App\Models\databox;
use App\Models\officeinf;
use App\Models\additional;
use App\Models\billinginf;
use App\Models\companyinf;
use App\Models\contact_title;
use App\Models\name_bank;
use App\Models\registration;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function getOfficeInf()
    {
        return response()->json(officeinf::all());
    }

    public function getCompanyInf()
    {
        return response()->json(companyinf::all());
    }

    public function getBillingInf()
    {
        return response()->json(billinginf::all());
    }

    public function getRegistration()
    {
        return response()->json(registration::all());
    }

    public function getVat()
    {
        return response()->json(vat::all());
    }

    public function getDatabox()
    {
        return response()->json(databox::all());
    }

    public function getAdditional()
    {
        return response()->json(additional::all());
    }

    public function getPhone()
    {
        return response()->json(phone::all());
    }

    public function getNameBank()
    {
        return response()->json(name_bank::all());
    }

    public function getContactTitle()
    {
        return response()->json(contact_title::all());
    }

    public function postOfficeInf(Request $request)
    {
        try {
            if (isset($request->id)) {
                $officeinf = officeinf::find($request->id);
                $officeinf->update($request->all());
            } else {
                $officeinf = officeinf::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postCompanyInf(Request $request)
    {
        try {
            if (isset($request->id)) {
                $companyinf = companyinf::find($request->id);
                $companyinf->update($request->all());
            } else {
                $companyinf = companyinf::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postBillingInf(Request $request)
    {
        try {
            if (isset($request->id)) {
                $billinginf = billinginf::find($request->id);
                $billinginf->update($request->all());
            } else {
                $billinginf = billinginf::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postRegistration(Request $request)
    {
        try {
            if (isset($request->id)) {
                $registration = registration::find($request->id);
                $registration->update($request->all());
            } else {
                $registration = registration::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postVat(Request $request)
    {
        try {
            if (isset($request->id)) {
                $vat = vat::find($request->id);
                $vat->update($request->all());
            } else {
                $vat = vat::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postDatabox(Request $request)
    {
        try {
            if (isset($request->id)) {
                $databox = databox::find($request->id);
                $databox->update($request->all());
            } else {
                $databox = databox::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postAdditional(Request $request)
    {
        try {
            if (isset($request->id)) {
                $additional = additional::find($request->id);
                $additional->update($request->all());
            } else {
                $additional = additional::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postPhone(Request $request)
    {
        try {
            if (isset($request->id)) {
                $phone = phone::find($request->id);
                $phone->update($request->all());
            } else {
                $phone = phone::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postNameBank(Request $request)
    {
        try {
            if (isset($request->id)) {
                $name_bank = name_bank::find($request->id);
                $name_bank->update($request->all());
            } else {
                $name_bank = name_bank::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postContactTitle(Request $request)
    {
        try {
            if (isset($request->id)) {
                $contact_title = contact_title::find($request->id);
                $contact_title->update($request->all());
            } else {
                $contact_title = contact_title::create($request->all());
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postOfficeInfDelete(Request $request)
    {
        try {
            $officeinf = officeinf::find($request->id);
            $officeinf->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postCompanyInfDelete(Request $request)
    {
        try {
            $companyinf = companyinf::find($request->id);
            $companyinf->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postBillingInfDelete(Request $request)
    {
        try {
            $billinginf = billinginf::find($request->id);
            $billinginf->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    
    public function postRegistrationDelete(Request $request)
    {
        try {
            $registration = registration::find($request->id);
            $registration->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postVatDelete(Request $request)
    {
        try {
            $vat = vat::find($request->id);
            $vat->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postAdditionalDelete(Request $request)
    {
        try {
            $additional = additional::find($request->id);
            $additional->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postDataboxDelete(Request $request)
    {
        try {
            $databox = databox::find($request->id);
            $databox->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postPhoneDelete(Request $request)
    {
        try {
            $phone = phone::find($request->id);
            $phone->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postNameBankDelete(Request $request)
    {
        try {
            $name_bank = name_bank::find($request->id);
            $name_bank->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postContactTitleDelete(Request $request)
    {
        try {
            $contact_title = contact_title::find($request->id);
            $contact_title->delete();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
