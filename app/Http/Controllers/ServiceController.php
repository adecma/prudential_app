<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Storage;

class ServiceController extends Controller
{
	public function index()
	{
        $files = Storage::disk('public')->allFiles('backup-db');

		return view('backup.index', compact('files'));
	}
    public function backup()
    {
    	Artisan::call('backup:run', ['--only-db' => true]);

    	session()->flash('notifikasi', '<strong>Berhasil!</strong> Database telah di backup.');

        return redirect()->route('service.index');
    }

    public function destroy($name)
    {
        $files = Storage::disk('public')->allFiles('backup-db');

        $foundFile = array_search('backup-db/' . $name, $files);

        Storage::disk('public')->delete($files[$foundFile]);

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Database telah di hapus.');

        return redirect()->route('service.index');
    }
}
