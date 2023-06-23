<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Rental::where('username', 'LIKE', '%' . $request->search. '%')->paginate(5);
        } else {
            $data = Rental::paginate(5);
        }

        return view('t_sewa', compact('data'));
    }

    public function addsewa()
    {
        return view('addsewa');
    }

    public function insertsewa(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|min:5|max:25', // phpcs:ignore ..DetectWeakValidation.Found
            'tujuan' => 'required',
        ]);
        Rental::create($request->all());
        return redirect()->route('sewa')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editsewa($id) {

        $data = Rental::find($id);
        // dd($data);

        return view('editadmin');
    }

    public function exportsewa() {
        $data = Rental::all();
        
        view()->share('data', $data);
        $pdf = PDF::loadview('t_sewa-pdf');
        return $pdf->download('data-sewa.pdf');
    }
}
