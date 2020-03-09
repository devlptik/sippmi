<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefSkema extends Model
{
    use SoftDeletes;

    public $table = 'ref_skemas';

    const JENIS_USULAN_SELECT = [
        'P'   => 'Penelitian',
        'PkM' => 'Pengabdian Kepada Masyarakat',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $fillable = [
        'nama',
        'anggota_max',
        'sumber_dana',
        'anggota_min',
        'mahasiswa_min',
        'mahasiswa_max',
        'jenis_usulan',
        'jangka_waktu',
        'biaya_minimal',
        'biaya_maksimal',
        'tanggal_mulai',
        'tanggal_selesai',
        'jabatan_ketua_max',
        'jabatan_ketua_min',
        'jabatan_anggota_min',
        'jabatan_anggota_max',
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function skemaOutputSkemas()
    {
        return $this->hasMany(OutputSkema::class, 'skema_id', 'id');
    }

    public function skemaPenelitians()
    {
        return $this->hasMany(Penelitian::class, 'skema_id', 'id');
    }

    public function skemaPengabdians()
    {
        return $this->hasMany(Pengabdian::class, 'skema_id', 'id');
    }

    public function getTanggalMulaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalMulaiAttribute($value)
    {
        $this->attributes['tanggal_mulai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalSelesaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalSelesaiAttribute($value)
    {
        $this->attributes['tanggal_selesai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function scopeWhereAvailable($query)
    {
        $currentDate = Carbon::now();
        return $query->whereDate('tanggal_mulai', '<=', $currentDate)
            ->whereDate('tanggal_selesai', '>=', $currentDate);
    }

    public function scopeWhereId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopePenelitian($query){
        return $query->where('jenis_usulan', Usulan::PENELITIAN);
    }
}
