<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyaddressRequest;
use App\Notifyaddresses;


class AddressesController extends Controller
{
    public function change()
    {
        return view('addresses.edit', ['address' => 1]);
    }

    public function save(NotifyaddressRequest $request)
    {
        $address = Notifyaddresses::query()->find($request->id);
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'MAIL_USERNAME=' . $address->name , 'MAIL_USERNAME=' . $request->name, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_PASSWORD=' . $address->password , 'MAIL_PASSWORD=' . $request->password, file_get_contents($path)
            ));
        }
        $address->name = $request->name;
        $address->password = $request->password;
        $address->save();
        return redirect()->route('goods.admin');
    }
}