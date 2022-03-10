<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index() {
		$files = [];
		$allFiles = Storage::files('uploads');
		$totalSize = 0;

		foreach ($allFiles as $file) {
			$size = Storage::size($file);
			$totalSize += $size;
			$files[] = [
				'name' => str_replace('uploads/', '', $file),
				'size' => $this->getSize($size)
			];
		}

		return view('files', ['files' => $files, 'totalSize' => $this->getSize($totalSize)]);
	}

	public function download($file) {
		return Storage::download('uploads/' . $file);
	}

	public function upload(Request $request) {
		$file = $request->file('fileUpload');
		Storage::putFileAs('uploads', $file, $file->getClientOriginalName());

		return redirect('/files');
	}


	protected function getSize($size_in_bytes) {
		if ($size_in_bytes < 1024) {

			return number_format($size_in_bytes, 2, '.', '') . ' B';
		} else if ($size_in_bytes >= 1024 && $size_in_bytes < 102400000) {

			return number_format($size_in_bytes / 1000, 2, '.', '') . ' K';
		} else if ($size_in_bytes >= 1048576 && $size_in_bytes < 1073741824) {

			return number_format($size_in_bytes / 1000000, 2, '.', '') . ' M';
		} else if ($size_in_bytes >= 1073741824) {

			return number_format($size_in_bytes / 1000000000, 2, '.', '') . ' G';
		}
	}
}
