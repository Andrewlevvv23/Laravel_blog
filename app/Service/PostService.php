<?php
namespace App\Service;

use App\Models\Post;
use Exception;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data) {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }


            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);        //імпорт в папку 'images' картинки з форми

            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);              //імпорт в папку 'images' картинки з форми

            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);                                                                                            //повернення даної помилки при невдалому 'try'
        }
    }

    public function update($data, $post) {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = ($data['tag_ids']);
                unset($data['tag_ids']);
            }
//            else $tagIds = [];
//            $post->tags()->sync($tagIds);

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}


