<?php

namespace App\Http\Controllers;


use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class FarmerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Farmer::where('nama', 'LIKE', '%' . $request->search. '%')->paginate(5);
        } else {
            $data = Farmer::paginate(5);
        }

        return view('t_petani', compact('data'));
    }

    public function addpetani(){
        return view('addpetani');
    }

    public function insertpetani(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'nama' => 'required|min:5|max:25', // phpcs:ignore ..DetectWeakValidation.Found
            'kontak' => 'required|min:12|max:20',
        ]);

        $data = Farmer::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopetani/', $request->file('foto')->getClientOriginalName()); // phpcs:ignore ..DetectUploadFil.Found,..DetectUploadFil.Found
            $data->foto = $request->file('foto')->getClientOriginalName(); // phpcs:ignore ..DetectUploadFil.Found
            $data->save();
        }
        
        return redirect()->route('petani')->with('success','Data Berhasil Ditambahkan');
    }

    public function editpetani($id) {

        $data = Farmer::find($id);
        // dd($data);

        return view('editpetani',compact('data'));
    }

    public function updatepetani(Request $request, $id) {
        $data = Farmer::find($id);
        $data->update($request->all());
        return redirect()->route('petani')->with('success','Data Berhasil Diupdate');
    }

    public function deletepetani($id) {
        $data = Farmer::find($id);
        $data->delete();
        return redirect()->route('petani')->with('success','Data Berhasil Dihapus');
    }

    public function exportpetani() {
        $data = Farmer::all();
        
        view()->share('data', $data);
        $pdf = PDF::loadview('t_petani-pdf');
        return $pdf->download('data-petani.pdf');
    }
}
