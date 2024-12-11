<?php

namespace App\Exports;

use App\Models\Review;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClusterExport implements FromArray, WithHeadings
{
    protected $clusters;
    protected $samples;

    public function __construct($clusters, $samples)
    {
        $this->clusters = $clusters;
        $this->samples = $samples;
    }

    // Define the data to be exported
    public function array(): array
    {
        $exportData = [];
        foreach ($this->clusters as $clusterId => $cluster) {
            foreach ($cluster as $sampleIndex) {
                $exportData[] = [
                    'Cluster' => $clusterId + 1,
                    'Jumlah Pengunjung' => $this->samples[$sampleIndex]['jumlah_pengunjung'],
                    'Aktivitas' => $this->samples[$sampleIndex]['activity_nama'],
                ];
            }
        }
        return $exportData;
    }

    // Define the headings for the Excel sheet
    public function headings(): array
    {
        return ['Cluster', 'Jumlah Pengunjung', 'Aktivitas'];
    }
}