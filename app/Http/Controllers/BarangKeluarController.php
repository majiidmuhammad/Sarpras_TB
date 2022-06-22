<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Operator;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BarangKeluar::latest()->with('barang', 'operator')->paginate(5);
        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $operator = Operator::all();
        return view('pengeluaran.tambahpengeluaran', compact('barang', 'operator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'kode_barang_id' => 'required',
        //     'barang_id' => 'required',
        //     'nama_peminta' => 'required',
        //     'status_peminta' => 'required',
        //     'jumlah_keluar' => 'required',
        // ]);

        $data = BarangKeluar::create($request->all());

        return redirect('pengeluaran')->with('success', 'data berhasil ditambahkan');
    }
}
