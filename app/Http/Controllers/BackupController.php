<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index()
    {
        return view('admin.backup');
    }

    public function backup()
    {
        $dbHost = env('DB_HOST');
        $dbPort = env('DB_PORT');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');

        $fileName = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $filePath = storage_path('app/' . $fileName);

        $command = "\"C:\\xampp\\mysql\\bin\\mysqldump\" --user={$dbUser} --password={$dbPass} --host={$dbHost} --port={$dbPort} {$dbName} > \"{$filePath}\"";

        system($command, $resultado);

        if ($resultado !== 0 || !file_exists($filePath)) {
            return back()->with('error', 'No se pudo generar el respaldo de la base de datos.');
        }

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function restore(Request $request)
    {
        $request->validate([
            'archivo_sql' => 'required|mimes:sql,txt',
        ]);

        $archivo = $request->file('archivo_sql');
        $rutaTemporal = $archivo->getRealPath();

        $dbHost = env('DB_HOST');
        $dbPort = env('DB_PORT');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');

        $command = "\"C:\\xampp\\mysql\\bin\\mysql\" --user={$dbUser} --password={$dbPass} --host={$dbHost} --port={$dbPort} {$dbName} < \"{$rutaTemporal}\"";

        system($command, $resultado);

        if ($resultado !== 0) {
            return back()->with('error', 'No se pudo restaurar la base de datos.');
        }

        return back()->with('success', 'La base de datos se restauró correctamente.');
    }
}