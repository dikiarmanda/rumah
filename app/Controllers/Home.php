<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ContactModel;
use App\Models\LaporanModel;
use App\Models\LeaderboardModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $userModel;
    protected $contactModel;
    protected $laporanModel;
    protected $leaderboardModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->contactModel = new ContactModel();
        $this->laporanModel = new LaporanModel();
        $this->leaderboardModel = new LeaderboardModel();
    }

    public function index()
    {
        $testimoni = [
            ['name' => 'John Doe', 'alamat' => 'Jakarta', 'text' => 'Terimakasih atas pelayanannya yang sangat baik.'],
            ['name' => 'Jane Doe', 'alamat' => 'Bandung', 'text' => 'Saya sangat puas dengan pelayanannya yang ramah dan cepat.'],
            ['name' => 'Bob Smith', 'alamat' => 'Surabaya', 'text' => 'Pelayanannya sangat profesional dan saya sangat merekomendasikan.'],
        ];
        $data = [
            'contact' => $this->contactModel->getData(),
            'stat' => $this->laporanModel->getStatistik(),
            'testimoni' => $testimoni,
            'leaderboard' => $this->leaderboardModel->getData(date('Y') - 1),
        ];
        return $this->template->displayLanding('home', $data);
    }

    public function agen()
    {
        $data = [
            'data' => $this->userModel->getAgents(),
            'contact' => $this->contactModel->getData(),
        ];
        return $this->template->displayLanding('agen', $data);
    }

    public function kpr()
    {
        $data = [
            'contact' => $this->contactModel->getData(),
        ];
        return $this->template->displayLanding('kpr', $data);
    }

    public function kebijakan()
    {
        return $this->template->displayLanding('kebijakan');
    }

    public function syarat()
    {
        return $this->template->displayLanding('syarat');
    }
}
