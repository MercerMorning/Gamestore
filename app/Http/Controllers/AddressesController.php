<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyaddressRequest;
use App\Notifyaddresses;


class AddressesController extends Controller
{
    private \Illuminate\Contracts\View\Factory $viewFactory;
    private \Illuminate\Routing\Redirector $redirector;

    /**
     * AddressesController constructor.
     * @param \Illuminate\Contracts\View\Factory $viewFactory
     *
     * @param \Illuminate\Routing\Redirector $redirector
     */
    public function __construct(\Illuminate\Contracts\View\Factory $viewFactory, \Illuminate\Routing\Redirector $redirector)
    {
        $this->viewFactory = $viewFactory;
        $this->redirector = $redirector;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Изменение
     */
    public function change()
    {
        return $this->viewFactory->make('addresses.edit', ['address' => 1]);
    }

    /**
     * @param NotifyaddressRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * Сохранение
     */
    public function save(NotifyaddressRequest $request)
    {
        $address = Notifyaddresses::query()->find($request->id);
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'MAIL_USERNAME=' . $address->name, 'MAIL_USERNAME=' . $request->name, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_PASSWORD=' . $address->password, 'MAIL_PASSWORD=' . $request->password, file_get_contents($path)
            ));
        }
        $address->name = $request->name;
        $address->password = $request->password;
        $address->save();
        return $this->redirector->route('goods.admin');
    }
}