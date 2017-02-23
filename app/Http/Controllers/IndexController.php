<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $size = 150;
        $hash = md5(strtolower(trim('d.lopez.1740@gmail.com')));

        $avatar = "https://www.gravatar.com/avatar/$hash?d=mm&s=$size";

        $portfolios = [];

        for ($i=1; $i<=8; $i++) {
            $portfolios[] = [
                'img'               => 'https://dummyimage.com/150x150/49a3d6/ffffff.jpg',
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
            'name'    => title_case($request->get('nombre')),
            'email'    => strtolower($request->get('correo')),
            'message'   => $request->get('mensaje'),
        ]);

        return back()->with('message', 'ok');
    }

}
