<?php
namespace App\Helpers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
Class NotifyHelper{

    public static function successfullyCreated()
    {
        return [
            'state' => 'success',
            'title' => "Berhasil",
            'message' => "Data berhasil dibuat."
        ];
    }

    public static function successfullyUpdated()
    {
        return [
            'state' => 'success',
            'title' => "Berhasil",
            'message' => "Data berhasil diperbarui."
        ];
    }

    public static function successfullyDeleted()
    {
        return [
            'state' => 'success',
            'title' => "Berhasil",
            'message' => "Data berhasil dihapus."
        ];
    }

    public static function errorOccurred($message = "")
    {
        return [
            'state' => 'error',
            'title' => "Terjadi Kesalahan",
            'message' => $message ?: "Maaf, terjadi kesalahan saat memproses permintaan Anda."
        ];
    }

    public static function notFound()
    {
        return [
            'state' => 'error',
            'title' => "Tidak Ditemukan",
            'message' => "Data tidak ditemukan."
        ];
    }

    public function notify($state, $title, $message)
    {
        return [
            'state' => $state,
            'title' => $title,
            'message' => $message,
        ];
    }

}