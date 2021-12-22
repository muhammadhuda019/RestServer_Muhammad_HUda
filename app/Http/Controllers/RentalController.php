<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;

class RentalController extends Controller
{
    public function data($kode_mobil = null){
        if ($kode_mobil !== null) $daftar_mobil = Rental::find($kode_mobil);
        else $daftar_mobil = Rental::all();
        return response([
            'status' => true,
            'message' => 'Daftar Mobil',
            'data' => $daftar_mobil
        ], 200);
    }


    public function insert_data_mobil(Request $request){
        $insert_mobil = new Rental;
        $insert_mobil->plat_nomer = $request->plat_nomer;
        $insert_mobil->nama_mobil = $request->nama_mobil;
        $insert_mobil->type = $request->type;
        $insert_mobil->harga_sewa = $request->harga_sewa;
        $insert_mobil->save();
        return response([
            'status' => true,
            'message' => 'Data Mobil Ditambahkan',
            // 'data' => $insert_barang
        ], 200);
    }

    public function update_data_mobil(Request $request, $kode_mobil){
        //cek terlebih dahulu data yang akan di-update melalui id
        //apakah barang ada atau tidak, jika tidak return not found
        $check_mobil = Rental::firstWhere('kode_mobil', $kode_mobil);
        if($check_mobil){
            // echo 'data yang anda cari tersedia';
            // $requestData = json_decode($request->getContent(), true);
            $data_mobil = Rental::find($kode_mobil);
            $data_mobil->plat_nomer = $request->input('plat_nomer');
            $data_mobil->nama_mobil = $request->input('nama_mobil');
            $data_mobil->type = $request->input('type');
            $data_mobil->harga_sewa = $request->input('harga_sewa');
            $data_mobil->save();
            return response([
                'status' => true,
                'message' => 'Data Berhasil Dirubah',
                // 'update-data' => $data_barang
            ], 200);
        } else {
            // echo 'tidak ada';
            return response([
                'status' => false,
                'message' => 'Kode Barang Tidak ditemukan'
            ], 404);
        }
    }

    public function delete_data_mobil($kode_mobil){
        //cek terlebih dahulu data yang akan hapus melalui id
        //apakah barang ada atau tidak, jika tidak return not found
        $check_mobil = Rental::firstWhere('kode_mobil', $kode_mobil);
        if($check_mobil){
            Rental::destroy($kode_mobil);
            return response([
                'status' => true,
                'message' => 'Data Dihapus',
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'Kode Barang Tidak ditemukan'
            ], 404);
        }
    }
}
