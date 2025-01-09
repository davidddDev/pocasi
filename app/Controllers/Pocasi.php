<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
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
        $data['measurements'] = $this->dataModel->where('Stations_ID', $idStation)->orderBy('date', 'asc')->findAll();

        return view('station_details', $data);
    }

    public function bundeslandDetails($id)
    {
        $data['bundesland'] = $this->bundeslandModel->find($id);
        return view('bundesland_details', $data);
    }

    public function stationsOverview()
    {
        $stations = $this->stationModel->findAll();
        $data['stations'] = [];

        foreach ($stations as $station) {
            $bundesland = $this->bundeslandModel->find($station->bundesland);
            $station->flag = $bundesland ? $bundesland->vlajky : null;
            $data['stations'][] = $station;
        }

        return view('stations_overview', $data);
    }
}
