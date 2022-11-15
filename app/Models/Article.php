<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'short_content',
        'user_id',
        'image_path'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Upload file
     *
     * @param $column
     * @param $path
     * @param UploadedFile|null $file
     * @return void
     */
    private function upload($column, $path, ?UploadedFile $file): void
    {
        $this[$column] = $file->store('public/' . $path);
        $this->save();
    }

    public function upload_image(UploadedFile|null $file)
    {
        if ($file) {
            if ($this->image_path) {
                Storage::delete($this->image_path);
            }

            $this->upload('image_path', 'images', $file);
        }
    }
}
