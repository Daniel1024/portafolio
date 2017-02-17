<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        //dd(config('app.url'));
        //$default = urlencode(config('app.url') . '/img/default_user.png');
        $size = 150;
        $hash = md5(strtolower(trim('d.lopez.1740@gmail.com')));

        $avatar = "https://www.gravatar.com/avatar/$hash?d=mm&s=$size";

        $portfolios = [];

        for ($i=1; $i<=8; $i++) {
            $portfolios[] = [
                'img'               => url("img/trabajos/$i.jpg"),
                'imgDescription'    => "Descripcion de la imgen $i",
                'title'             => 'Lorem Ipsum',
                'tags'              => 'HTML - CSS - PHP',
                'url'               => '#'
            ];
        }

        return view('portfolio.index', compact('avatar', 'portfolios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    => 'required|min:3',
            'correo'    => 'required|min:3|email',
            'mensaje'   => 'required|min:10'
        ]);

        Contact::create([
            'nombre'    => title_case($request->get('nombre')),
            'correo'    => strtolower($request->get('correo')),
            'mensaje'   => $request->get('mensaje'),
        ]);

        return back()->with('message', 'ok');
    }
}
