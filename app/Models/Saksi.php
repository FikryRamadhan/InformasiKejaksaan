<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;


class Saksi extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function pelanggar()
    {
        return $this->belongsTo(Pelanggar::class, 'id_pelanggar', 'id');
    }

    public function bukti()
    {
        return $this->belongsTo(Bukti::class, 'id_saksi', 'id');
    }

    public function productFileLinkHtml()
    {
        if ($this->isHasProductPhoto()) {
            $href = '<a href="' . $this->productPhotoFileLink() . '" target="_blank"> Lihat Photo </a>';
            return $href;
        } else {
            return '<span class="text-danger"> Tidak Melampirkan Photo </span>';
        }
    }

    public function isHasProductPhoto()
    {
        if (empty($this->file)) return false;
        return \File::exists($this->productFilePath());
    }

    // Upload Photo To Storage
    public function productFilePath()
    {
        return public_path('product_photo/' . $this->file);
    }

    public function productPhotoFileLink()
    {
        return url('public/product_photo/' . $this->file);
    }
}
