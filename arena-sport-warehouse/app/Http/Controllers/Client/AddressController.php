<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // fungsi untuk membuka halaman edit alamat
    public function edit($id)
    {
        $user = Auth::user();

        $address = Address::where('id', $id)->where('user_id', $user->id)->first();

        return view('client.address.update', compact('address'));
    }

    // fungsi untuk mengambil data produk
    public function index()
    {
        $user = Auth::user();

        $addresses = Address::all()->whereNull('deleted_at')->where('user_id', $user->id);

        return view('client.profile.index', compact(['user', 'addresses']));
    }

    // fungsi untuk membuat alamat
    public function create(Request $request)
    {
        $data = $request->validate([
            'recipient_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'additional_info' => 'nullable',
        ]);

        $user = Auth::user();

        $address = Address::create([
            'user_id' => $user->id,
            'recipient_name' => $data['recipient_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'province' => $data['province'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
            'additional_information' => $data['additional_info'],
            'created_at' => now()
        ]);

        return redirect()->route('profile')->with('success', 'Data berhasil diupdate');
    }

    // fungsi untuk mengupdate alamat
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
            'additional_info' => 'nullable',
        ]);

        $address = Address::where('id', $addressId)->where('user_id', $user->id)->first();

        if (!$address) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $address->update([
            'recipient_name' => $data['recipient_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'province' => $data['province'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
            'additional_information' => $data['additional_info'],
            'updated_at' => now()
        ]);
        $address->save();

        return redirect()->route('profile')->with('success', 'Data berhasil diupdate');
    }

    // fungsi untuk menghapus alamat
    public function delete($id)
    {
        $user = Auth::user();

        $address = Address::where('id', $id)->where('user_id', $user->id)->first();

        if (!$address) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $address->deleted_at = now();
        $address->save();

        return redirect()->route('profile')->with('success', 'Data berhasil diupdate');
    }
}
