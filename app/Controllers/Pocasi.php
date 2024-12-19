<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Bundesland;
use App\Models\Station;

class Pocasi extends BaseController
{
    public function stations($idStations)
    {
        $station = new Station();
        $data['stations'] = $station->where('bundesland', $idStations)->findAll();
        $data['bundesland'] = (new Bundesland())->find($idStations);
        
        echo view('station', $data);
    }
    

    public function bundesland() {
        $bundesland = new Bundesland();
        $data["bundesland"]=$bundesland->findAll();
        echo view('bundesland', $data);
    }
    public function stationDetails($idStation)
    {
        $stationModel = new \App\Models\Station();
        $data['station'] = $stationModel->find($idStation);

        $dataModel = new \App\Models\Data();
        $data['measurements'] = $dataModel->where('Stations_ID', $idStation)->orderBy('date', 'asc')->findAll();

        return view('station_details', $data);
    }
    

}
