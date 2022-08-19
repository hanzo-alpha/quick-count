<?php

  namespace App\Exports;

  use App\Models\HitungCepat;
  use Illuminate\Contracts\Support\Responsable;
  use Illuminate\Database\Eloquent\Builder;
  use Illuminate\Support\Collection;
  use Indonesia;
  use Maatwebsite\Excel\Concerns\Exportable;
  use Maatwebsite\Excel\Concerns\FromQuery;
  use Maatwebsite\Excel\Concerns\ShouldAutoSize;
  use Maatwebsite\Excel\Concerns\WithHeadings;
  use Maatwebsite\Excel\Concerns\WithMapping;
  use Maatwebsite\Excel\Excel;

  class HitungCepatExport implements FromQuery, WithMapping, ShouldAutoSize, Responsable, WithHeadings
  {
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private string $fileName = 'rekap-suara.xlsx';

    /**
     * Optional Writer Type
     */
    private string $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private array $headers = [
      'Content-Type' => 'text/csv',
    ];

    /**
     * @return HitungCepat|Builder|Collection
     */
//    public function collection()
//    {
//        return HitungCepat::all();
//    }

    public function query()
    {
      return HitungCepat::query()
        ->select(['id', 'kecamatan', 'desa', 'suara1', 'suara2', 'suara_tidak_sah', 'no_tps']);
    }

    public function headings(): array
    {
      return [
        'NO',
        'KECAMATAN',
        'KELURAHAN/DESA',
        'TPS',
        'SUARA PASANGAN CALON',
        'SUARA KOLOM KOSONG',
        'SUARA TIDAK SAH',
      ];
    }

    /**
     * @return array
     * @var HitungCepat $hitung
     */
    public function map($hitung): array
    {
      $kecamatan = Indonesia::findDistrict($hitung->kecamatan, 'villages');
      $desa = Indonesia::findVillage($hitung->desa);

      return [
        $hitung->id,
        $kecamatan->name,
        $desa->name,
        $hitung->no_tps,
        $hitung->suara1,
        $hitung->suara2,
        $hitung->suara_tidak_sah,
      ];
    }
  }
