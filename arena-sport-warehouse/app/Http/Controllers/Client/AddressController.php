<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $addresses = Address::all()->where('deleted_at', null)->where('user_id', $user->id);

        return view('client.profile.index', compact('addresses'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'recipient_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        $user = Auth::user();

        $address = Address::create($data);
        $address->user_id = $user->id;
        $address->save();

        return redirect()->route('client.address.index')->with('success', 'Data berhasil diupdate');
    }

    public function update($addressId, Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'recipient_name' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'province' => 'nullable',
            'country' => 'nullable',
            'postal_code' => 'nullable',
        ]);

        $address = Address::where('id', $addressId)->where('user_id', $user->id)->first();

        if (!$address) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $address->update($data);
        $address->updated_at = now();
        $address->save();

        return redirect()->route('client.address.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($addressId)
    {
        $user = Auth::user();

        $address = Address::where('id', $addressId)->where('user_id', $user->id)->first();

        if (!$address) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $address->deleted_at = now();
        $address->save();

        return redirect()->route('client.address.index')->with('success', 'Data berhasil diupdate');
    }
}
