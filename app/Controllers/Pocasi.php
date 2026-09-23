<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bundesland;
use App\Models\Station;
use App\Models\Data;

class Pocasi extends BaseController
{
    protected $stationModel;
    protected $bundeslandModel;
    protected $dataModel;

    public function __construct()
    {
        $this->stationModel = new Station();
        $this->bundeslandModel = new Bundesland();
        $this->dataModel = new Data();
    }

    public function stations($idStations)
    {
        $data['stations'] = $this->stationModel->where('bundesland', $idStations)->findAll();
        $data['bundesland'] = $this->bundeslandModel->find($idStations);

        echo view('station', $data);
    }

    public function bundesland()
    {
        $data["bundesland"] = $this->bundeslandModel->findAll();
        echo view('bundesland', $data);
    }

    public function stationDetails($idStation)
    {
        $data['station'] = $this->stationModel->find($idStation);
        $data['measurements'] = $this->dataModel->where('Stations_ID', $idStation)->orderBy('date', 'asc')->paginate(25);
        $pager = $this->dataModel->pager;
        $data['pager'] = $pager;

        return view('station_details', $data);
    }

    public function bundeslandDetails($id)
    {
        $data['bundesland'] = $this->bundeslandModel->find($id);
        return view('bundesland_details', $data);
    }


    public function stationsList(){
        $stations = $this->stationModel->join('pocasi_bundesland', 'station.bundesland = pocasi_bundesland.id', 'inner')
            ->select('station.*, pocasi_bundesland.vlajky AS vlajky')
            ->findAll();
        foreach ($stations as &$station) {
            $bundesland = $this->bundeslandModel->find($station->bundesland);
            $station->bundesland_name = $bundesland->name;
        }
        return view('stations_list', ['stations' => $stations]);
    }

public function deleteMonthData()
{
    $stationId = $this->request->getPost('station_id');
    $year = $this->request->getPost('year');
    $month = $this->request->getPost('month');

    $from = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-01';
    $to = date('Y-m-d', strtotime($from . ' +1 month'));

    $this->dataModel
        ->where('Stations_ID', $stationId)
        ->where('date >=', $from)
        ->where('date <', $to)
        ->delete();

    return redirect()->to('station/details/' . $stationId);
}
}