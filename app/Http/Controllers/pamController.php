<?php

namespace App\Http\Controllers;

use Phpml\Clustering\KMeans;
use Phpml\Clustering\KMedoids;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Exports\ClusterExport;
use Maatwebsite\Excel\Facades\Excel;

class pamController extends Controller
{
    // Export to Excel
    public function export(Request $request)
    {
        // Recalculate clusters and samples
        $reviews = Review::all();
        $samples = [];
        foreach ($reviews as $review) {
            $samples[] = [
                'jumlah_pengunjung' => $review->jumlah_pengunjung,
                'activity_nama' => $review->activity->nama,
                'activity_id' => $review->activity_id,
            ];
        }

        $numClusters = 3;
        $medoids = $this->initializeMedoids($samples, $numClusters);
        $clusters = [];
        $prevMedoids = [];
        while ($medoids !== $prevMedoids) {
            $prevMedoids = $medoids;
            $clusters = $this->assignToClusters($samples, $medoids);
            $medoids = $this->updateMedoids($samples, $clusters);
        }

        // Export using ClusterExport
        return Excel::download(new ClusterExport($clusters, $samples), 'clusters.xlsx');
    }
    public function index()
    {
        $type_menu= 'review';
        // Ambil semua data review
        $reviews = Review::all();

        // Menyiapkan data untuk clustering
        $samples = [];
        foreach ($reviews as $review) {
            // Ambil jumlah_pengunjung dan activity_id sebagai fitur
            $samples[] = [
                'jumlah_pengunjung' => $review->jumlah_pengunjung,
                'activity_nama' => $review->activity->nama,
                'activity_id' => $review->activity_id,
            ];
        }

        // Tentukan jumlah cluster (misalnya 3)
        $numClusters = 3;

        // Langkah 1: Inisialisasi Medoids secara acak
        $medoids = $this->initializeMedoids($samples, $numClusters);

        // Langkah 2: Iterasi clustering sampai tidak ada perubahan
        $clusters = [];
        $prevMedoids = [];
        while ($medoids !== $prevMedoids) {
            $prevMedoids = $medoids;

            // Langkah 3: Asosiasikan data ke medoids terdekat
            $clusters = $this->assignToClusters($samples, $medoids);

            // Langkah 4: Perbarui Medoids
            $medoids = $this->updateMedoids($samples, $clusters);
        }

        // Kirim data ke view, sertakan juga samples
        return view('pages.pam.index', compact('clusters', 'samples', 'type_menu'));
    }

    // Inisialisasi medoids secara acak
    private function initializeMedoids($samples, $numClusters)
    {
        $medoids = [];
        $sampleCount = count($samples);
        $indices = array_rand($samples, $numClusters);

        if ($numClusters === 1) {
            $medoids[] = $samples[$indices];
        } else {
            foreach ($indices as $index) {
                $medoids[] = $samples[$index];
            }
        }

        return $medoids;
    }

    // Asosiasikan data ke medoids terdekat
    private function assignToClusters($samples, $medoids)
    {
        $clusters = [];
        foreach ($samples as $i => $sample) {
            $distances = [];
            foreach ($medoids as $j => $medoid) {
                // Hitung jarak (misalnya menggunakan Euclidean distance)
                $distances[$j] = $this->euclideanDistance($sample, $medoid);
            }
            $closestMedoid = array_keys($distances, min($distances))[0];
            $clusters[$closestMedoid][] = $i;
        }

        return $clusters;
    }

    // Hitung jarak Euclidean
    private function euclideanDistance($a, $b)
    {
        return sqrt(pow($a['jumlah_pengunjung'] - $b['jumlah_pengunjung'], 2) + pow($a['activity_id'] - $b['activity_id'], 2));
    }

    // Perbarui medoids dengan memilih data yang meminimalkan jarak
    private function updateMedoids($samples, $clusters)
    {
        $medoids = [];
        foreach ($clusters as $cluster) {
            $minCost = PHP_INT_MAX;
            $bestMedoid = null;
            foreach ($cluster as $i) {
                $cost = 0;
                foreach ($cluster as $j) {
                    if ($i !== $j) {
                        $cost += $this->euclideanDistance($samples[$i], $samples[$j]);
                    }
                }

                if ($cost < $minCost) {
                    $minCost = $cost;
                    $bestMedoid = $samples[$i];
                }
            }
            $medoids[] = $bestMedoid;
        }

        return $medoids;
    }
}
