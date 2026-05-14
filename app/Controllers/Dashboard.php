
<?php

namespace App\Controllers;

use App\Models\GedungModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new GedungModel();
        $data['gedung'] = $model->findAll();
        return view('dashboard/index', $data);
    }

    public function create()
    {
        return view('dashboard/create');
    }

    public function store()
    {
        $model = new GedungModel();
        $data = [
            'nama_gedung' => $this->request->getPost('nama_gedung'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'harga' => $this->request->getPost('harga'),
            'lokasi' => $this->request->getPost('lokasi')
        ];
        $model->save($data);
        return redirect()->to('/dashboard');
    }

    public function edit($id)
    {
        $model = new GedungModel();
        $data['gedung'] = $model->find($id);
        return view('dashboard/edit', $data);
    }

    public function update($id)
    {
        $model = new GedungModel();
        $data = [
            'nama_gedung' => $this->request->getPost('nama_gedung'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'harga' => $this->request->getPost('harga'),
            'lokasi' => $this->request->getPost('lokasi')
        ];
        $model->update($id, $data);
        return redirect()->to('/dashboard');
    }

    public function delete($id)
    {
        $model = new GedungModel();
        $model->delete($id);
        return redirect()->to('/dashboard');
    }
}
