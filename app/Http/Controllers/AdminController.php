<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Admin::where('username', 'LIKE', '%' . $request->search. '%')->paginate(5);
        } else {
            $data = Admin::paginate(5);
        }

        return view('t_admin', compact('data'));
    }

    public function addadmin(){
        return view('addadmin');
    }

    public function insertadmin(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'username' => 'required|min:5|max:25', // phpcs:ignore ..DetectWeakValidation.Found
            'fullname' => 'required|min:11|max:20',
            'password' => 'required|min:6|max:20',
        ]);
        Admin::create($request->all());
        return redirect()->route('admin')->with('success','Data Berhasil Ditambahkan');
    }

    public function editadmin($id) {

        $data = Admin::find($id);
        // dd($data);

        return view('editadmin',compact('data'));
    }

    public function updateadmin(Request $request, $id) {
        $data = Admin::find($id);
        $data->update($request->all());
        return redirect()->route('admin')->with('success','Data Berhasil Diupdate');
    }

    public function deleteadmin($id) {
        $data = Admin::find($id);
        $data->delete();
        return redirect()->route('admin')->with('success','Data Berhasil Dihapus');
    }

    public function exportadmin() {
        $data = Admin::all();
        
        view()->share('data', $data);
        $pdf = PDF::loadview('t_admin-pdf');
        return $pdf->download('data-admin.pdf');
    }
}
