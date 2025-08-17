<?php
namespace App\Helpers;

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
            'state' => 'danger',
            'title' => "Terjadi Kesalahan",
            'message' => $message ?: "Maaf, terjadi kesalahan saat memproses permintaan Anda."
        ];
    }

    public static function notFound()
    {
        return [
            'state' => 'danger',
            'title' => "Tidak Ditemukan",
            'message' => "Data tidak ditemukan."
        ];
    }

    public static function notify($state, $title, $message)
    {
        return [
            'state' => $state,
            'title' => $title,
            'message' => $message,
        ];
    }

}