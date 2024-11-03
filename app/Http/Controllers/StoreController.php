<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Device;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        $users = User::all();
        $devices = Device::all();

        return view('admin.stores.index', compact('stores', 'users', 'devices'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.stores.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|string',
            'address' => 'required|string',
            'owner_name' => 'required|string',
            'email' => 'required|email',
            'company_id' => 'required|exists:companies,id',
        ]);

        $store = new Store();
        $store->title = $request->input('title');
        $store->address = $request->input('address');
        $store->owner_name = $request->input('owner_name');
        $store->owner_cnic = $request->input('owner_cnic');
        $store->email = $request->input('email');
        $store->company_id = $request->input('company_id');
        $store->contact_no = $request->input('contact_no');
        $store->fax = $request->input('fax');
        $store->save();

        return redirect(route('stores.index'))->with('message', 'Factory registration updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        $companies = Company::all();
        return view('admin.stores.edit', compact('store', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $this->validate(request(), [
            'title' => 'required|string',
            'address' => 'required|string',
            'owner_name' => 'required|string',
            'email' => 'required|email',
            'company_id' => 'required|exists:companies,id',
        ]);

        $store->title = $request->input('title');
        $store->address = $request->input('address');
        $store->owner_name = $request->input('owner_name');
        $store->owner_cnic = $request->input('owner_cnic');
        $store->email = $request->input('email');
        $store->company_id = $request->input('company_id');
        $store->contact_no = $request->input('contact_no');
        $store->fax = $request->input('fax');
        $store->save();

        return redirect(route('stores.index'))->with('message', 'Factory registration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('stores.index')->with('message', 'Factory deleted successfully.');

    }
}
