<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use App\Models\PendaftarAsalSekolah;
use App\Models\Pembayaran;
use DB;

class KepsekTestDataSeeder extends Seeder
{
    public function run()
    {
        // Update existing pendaftar_data_siswa with valid village_id and kode_pos
        $validVillageIds = DB::table('villages')->limit(5)->pluck('id')->toArray();
        
        $pendaftarDataSiswa = DB::table('pendaftar_data_siswa')->get();
        
        foreach ($pendaftarDataSiswa as $index => $data) {
            if ($index < count($validVillageIds)) {
                $villageId = $validVillageIds[$index];
                
                // Get district_id and postal code
                $village = DB::table('villages')
                    ->join('districts', 'villages.district_id', '=', 'districts.id')
                    ->where('villages.id', $villageId)
                    ->select('districts.id as district_id')
                    ->first();
                
                $kodePos = $this->getPostalCodeByDistrict($village->district_id ?? null);
                
                DB::table('pendaftar_data_siswa')
                    ->where('pendaftar_id', $data->pendaftar_id)
                    ->update([
                        'village_id' => $villageId,
                        'kode_pos' => $kodePos
                    ]);
            }
        }
        
        echo "Updated pendaftar_data_siswa with valid village_id and kode_pos\n";
        
        // Update some pendaftar status to show variety in dashboard
        $pendaftarIds = Pendaftar::pluck('id')->toArray();
        
        if (count($pendaftarIds) >= 3) {
            // Set first as ADM_PASS (terverifikasi)
            Pendaftar::where('id', $pendaftarIds[0])->update(['status' => 'ADM_PASS']);
            
            // Set second as PAID (diterima) 
            Pendaftar::where('id', $pendaftarIds[1])->update(['status' => 'PAID']);
            
            // Set third as SUBMIT (menunggu)
            Pendaftar::where('id', $pendaftarIds[2])->update(['status' => 'SUBMIT']);
        }
        
        echo "Updated pendaftar status for variety\n";
    }
    
    private function getPostalCodeByDistrict($districtId)
    {
        $postalCodeMap = [
            '3275010' => '17112', '3275020' => '17143', '3275030' => '17113',
            '3275040' => '17113', '3275050' => '17141', '3275060' => '17134',
            '3275070' => '17122', '3204010' => '40391', '3204290' => '40625',
            '3216022' => '17530', '3273110' => '40614', '3171060' => '12190',
            '3212041' => '45264',
        ];
        
        return $postalCodeMap[$districtId] ?? '00000';
    }
}