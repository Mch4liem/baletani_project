<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Member::where('nama', 'LIKE', '%' . $request->search.'%')->paginate(5);
        } else {
            $data = Member::paginate(5);
        }

        return view('t_member', compact('data'));
    }

        public function addmember(){
            return view('addmember');
        }

        public function insertmember(Request $request){
            // dd($request->all());
            $this->validate($request,[
                'nama' => 'required|min:5|max:25', // phpcs:ignore ..DetectWeakValidation.Found
                'kontak' => 'required|min:12|max:20',
            ]);
            $data = Member::create($request->all());
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('fotomember/', $request->file('foto')->getClientOriginalName()); // phpcs:ignore ..DetectUploadFil.Found,..DetectUploadFil.Found
                $data->foto = $request->file('foto')->getClientOriginalName(); // phpcs:ignore ..DetectUploadFil.Found
                $data->save();
            }
            return redirect()->route('member')->with('success','Data Berhasil Ditambahkan');
        }

        public function editmember($id) {

            $data = Member::find($id);
            // dd($data);

            return view('editmember',compact('data'));
        }

        public function updatemember(Request $request, $id) {
            $data = Member::find($id);
            $data->update($request->all());
            return redirect()->route('member')->with('success','Data Berhasil Diupdate');
        }

        public function deletemember($id) {
            $data = Member::find($id);
            $data->delete();
            return redirect()->route('member')->with('success','Data Berhasil Dihapus');
        }

        public function exportmember() {
            $data = Member::all();
            
            view()->share('data', $data);
            $pdf = PDF::loadview('t_member-pdf');
            return $pdf->download('data-member.pdf');
        }
    }

