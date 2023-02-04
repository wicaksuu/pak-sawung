<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Kaos;
use App\Models\Kelas;
use App\Models\Peserta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $fh = fopen("database/seeders/kelas.csv", "r");
        
        while (!feof($fh)) {
            $line = fgets($fh);
            $kelass = explode(",", $line);
            Peserta::create(["nama"=>$kelass[0],"kelas_id"=>$kelass[1]]);
        }
        
        fclose($fh);

        Kaos::create(["nama"=>"Ukuran S"]);
        Kaos::create(["nama"=>"Ukuran M"]);
        Kaos::create(["nama"=>"Ukuran L"]);
        Kaos::create(["nama"=>"Ukuran XL"]);
        Kaos::create(["nama"=>"Ukuran 2XL"]);
        Kaos::create(["nama"=>"Ukuran 3XL"]);

        Kelas::create(["nama"=>"Kelas A"]);
        Kelas::create(["nama"=>"Kelas B"]);
        Kelas::create(["nama"=>"Kelas C"]);
        Kelas::create(["nama"=>"Kelas D"]);
        Kelas::create(["nama"=>"Kelas E"]);
        Kelas::create(["nama"=>"Kelas F"]);
        Kelas::create(["nama"=>"Kelas G"]);
        Kelas::create(["nama"=>"Kelas H"]);


        // KIRIM WILAYAH
        if (file_exists('database_basic/provinsi.json')) {
            $provinsi = json_decode(file_get_contents("database_basic/provinsi.json"), true);
            $i = 0;
            foreach ($provinsi as $item) {
                $i++;
                echo "Provinsi $i/" . count($provinsi) . "\n";
                Provinsi::create([
                    'id' => $item['id'],
                    'nama' => $item['nama'],
                ]);
            }
        }


        if (file_exists('database_basic/kota.json')) {
            $kota = json_decode(file_get_contents("database_basic/kota.json"), true);
            $i = 0;
            foreach ($kota as $item) {
                $i++;
                echo "Kota $i/" . count($kota) . "\n";
                Kota::create([
                    'id' => $item['id'],
                    'id_provinsi' => $item['id_provinsi'],
                    'nama' => $item['nama'],
                ]);
            }
        }

        if (file_exists('database_basic/kecamatan.json')) {
            $kecamtan = json_decode(file_get_contents("database_basic/kecamatan.json"), true);
            $i = 0;
            foreach ($kecamtan as $item) {
                $i++;
                echo "Kecamatan $i/" . count($kecamtan) . "\n";
                Kecamatan::create([
                    'id' => $item['id'],
                    'id_kota' => $item['id_kota'],
                    'nama' => $item['nama'],
                    'kode_pos' => $item['kode_pos'],
                ]);
            }
        }


        if (file_exists('database_basic/desa.json')) {
            $desa = json_decode(file_get_contents("database_basic/desa.json"), true);
            $i = 0;
            foreach ($desa as $item) {
                $i++;
                echo "Desa $i/" . count($desa) . "\n";
                Desa::create([
                    'id' => $item['id'],
                    'id_kecamatan' => $item['id_kecamatan'],
                    'nama' => $item['name'],
                ]);
            }
        }
        // END KIRIM WILAYAH
    }
}
