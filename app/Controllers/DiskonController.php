<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;
use CodeIgniter\HTTP\ResponseInterface;

class DiskonController extends BaseController
{
    protected $diskon;
    function __construct()
    {
        helper(['form']);
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        $diskon = $this->diskon->findAll();
        $data['diskon'] = $diskon;
        return view('v_diskon', $data);
    }
    public function create()
    {
        $rules = [
            'tanggal' => [
                'rules' => 'required|is_unique[diskon.tanggal]',
                'errors' => [
                    'is_unique' => 'Tanggal diskon sudah ada, tidak boleh duplikat.'
                ]
            ],
            'nominal' => 'required|numeric'
        ];
        if (!$this->validate($rules)) {
            return redirect('diskon')->with('failed', 'the tanggal field must be unique');
        }
        $dataform = [
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ];

        $this->diskon->insert($dataform);
        return redirect('diskon')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $rules = [
            'tanggal' => [
                'rules' => 'required|is_unique[diskon.tanggal]',
                'errors' => [
                    'is_unique' => 'Tanggal diskon sudah ada, tidak boleh duplikat.'
                ]
            ],
            'nominal' => 'required|numeric'
        ];
        if (!$this->validate($rules)) {
            return redirect('diskon')->with('failed', 'The tanggal field must be unique');
        }
        $dataform = [
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ];
        $this->diskon->update($id, $dataform);
        return redirect('diskon')->with('success', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $this->diskon->delete($id);
        return redirect('diskon')->with('success', 'Data berhasil dihapus');
    }
}