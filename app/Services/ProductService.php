<?php

namespace App\Services;

class ProductService
{
    public function handleUploadImage($images)
    {
        foreach ($images as $image) {
            $name = date('Y_m_d_') . '.' . $image->extension();
            $image->move(public_path() . '/uploads/', $name);
            $data[] = $name;
        }

        return json_encode($data);
    }
}