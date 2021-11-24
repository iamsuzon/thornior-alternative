<?php

namespace App\Services\Blogger;

use App\Models\AllMedia;
use Intervention\Image\Facades\Image;

class AddImages
{
    public function storeImage($request, $post)
    {
        if ($post->post_type == 'video')
        {
            $Component = 'App\Services\Blogger\Components\VideoComponent';
        }
        elseif ($post->post_type == 'image')
        {
            $Component = 'App\Services\Blogger\Components\ImageComponent';
        }

        if ($request->has('thumbnail_image') and $request->thumbnail_image != null) {
            $image_name = time() . 'f.' . $request->thumbnail_image->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('thumbnail_image'))->save($image_path, 80, 'jpg');

            AllMedia::create([
                'video_id' => $post->id,
                'post_type' => $post->post_type,
                'name' => $image_name,
                'number' => '0',
                'mime_type' => $request->thumbnail_image->extension(),
                'address' => $image_path
            ]);
        }
        if ($request->has('cover_image') and $request->cover_image != null) {
            $image_name = time() . 'f.' . $request->cover_image->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('cover_image'))->save($image_path, 80, 'jpg');

            AllMedia::create([
                'image_id' => $post->id,
                'post_type' => $post->post_type,
                'name' => $image_name,
                'number' => '0',
                'mime_type' => $request->cover_image->extension(),
                'address' => $image_path
            ]);
        }
        if ($request->has('image_1') and $request->image_1 != null) {
            $number = '1';
            $mime = $request->image_1->extension();
            $image_name = time() . '1.' . $request->image_1->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_1'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_2') and $request->image_2 != null) {
            $number = '2';
            $mime = $request->image_2->extension();
            $image_name = time() . '2.' . $request->image_2->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_2'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_3') and $request->image_3 != null) {
            $number = '3';
            $mime = $request->image_3->extension();
            $image_name = time() . '3.' . $request->image_3->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_3'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_4') and $request->image_4 != null) {
            $number = '4';
            $mime = $request->image_4->extension();
            $image_name = time() . '4.' . $request->image_4->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_4'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_5') and $request->image_5 != null) {
            $number = '5';
            $mime = $request->image_5->extension();
            $image_name = time() . '5.' . $request->image_5->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_5'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_6') and $request->image_6 != null) {
            $number = '6';
            $mime = $request->image_6->extension();
            $image_name = time() . '6.' . $request->image_6->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_6'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_7') and $request->image_7 != null) {
            $number = '7';
            $mime = $request->image_7->extension();
            $image_name = time() . '7.' . $request->image_7->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_7'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_8') and $request->image_8 != null) {
            $number = '8';
            $mime = $request->image_8->extension();
            $image_name = time() . '8.' . $request->image_8->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_8'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
        if ($request->has('image_9') and $request->image_9 != null) {
            $number = '9';
            $mime = $request->image_9->extension();
            $image_name = time() . '9.' . $request->image_9->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('image_9'))->save($image_path, 80, 'jpg');

            $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
        }
    }

    public function updateImage($request, $post)
    {
        if ($post->post_type == 'video')
        {
            $Component = 'App\Services\Blogger\Components\VideoComponent';
        }
        elseif ($post->post_type == 'image')
        {
            $Component = 'App\Services\Blogger\Components\ImageComponent';
        }

        if ($request->has('thumbnail_image') and $request->thumbnail_image != null) {
            unlink($post->medias[0]->address);

            $number = '0';
            $mime = $request->thumbnail_image->extension();
            $image_name = time() . 'f.' . $request->thumbnail_image->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('thumbnail_image'))->save($image_path, 80, 'jpg');

            $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);
        }

        if ($request->has('cover_image') and $request->cover_image != null) {
            unlink($post->medias[0]->address);

            $number = '0';
            $mime = $request->cover_image->extension();
            $image_name = time() . 'f.' . $request->cover_image->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            Image::make($request->file('cover_image'))->save($image_path, 80, 'jpg');

            $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);
        }

        if ($request->has('image_1') and $request->image_1 != null) {

            $IMAGE_EXIST = false;
            $number = '1';
            $mime = $request->image_1->extension();
            $image_name = time() . '1.' . $request->image_1->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_1') {

                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_1'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {

                Image::make($request->file('image_1'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }

        }

        if ($request->has('image_2') and $request->image_2 != null) {

            $IMAGE_EXIST = false;
            $number = '2';
            $mime = $request->image_2->extension();
            $image_name = time() . '2.' . $request->image_2->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_2') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_2'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_2'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }

        }

        if ($request->has('image_3') and $request->image_3 != null) {

            $IMAGE_EXIST = false;
            $number = '3';
            $mime = $request->image_3->extension();
            $image_name = time() . '3.' . $request->image_3->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_3') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_3'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_3'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }

        }

        if ($request->has('image_4') and $request->image_4 != null) {

            $IMAGE_EXIST = false;
            $number = '4';
            $mime = $request->image_4->extension();
            $image_name = time() . '4.' . $request->image_4->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_4') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_4'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_4'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }

        }

        if ($request->has('image_5') and $request->image_5 != null) {

            $IMAGE_EXIST = false;
            $number = '5';
            $mime = $request->image_5->extension();
            $image_name = time() . '5.' . $request->image_5->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_5') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_5'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_5'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }
        }

        if ($request->has('image_6') and $request->image_6 != null) {

            $IMAGE_EXIST = false;
            $number = '6';
            $mime = $request->image_6->extension();
            $image_name = time() . '6.' . $request->image_6->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_6') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_6'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_6'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }

        }

        if ($request->has('image_7') and $request->image_7 != null) {

            $IMAGE_EXIST = false;
            $number = '7';
            $mime = $request->image_7->extension();
            $image_name = time() . '7.' . $request->image_7->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_7') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_7'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_7'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }
        }

        if ($request->has('image_8') and $request->image_8 != null) {

            $IMAGE_EXIST = false;
            $number = '8';
            $mime = $request->image_8->extension();
            $image_name = time() . '8.' . $request->image_8->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_8') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_8'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_8'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }
        }

        if ($request->has('image_9') and $request->image_9 != null) {

            $IMAGE_EXIST = false;
            $number = '9';
            $mime = $request->image_9->extension();
            $image_name = time() . '9.' . $request->image_9->extension();
            $image_path = 'upload/blogger_image_post/' . $image_name;

            foreach ($post->medias as $key => $media) {
                if ($media->number == 'image_9') {
                    unlink($post->medias[$key]->address);

                    Image::make($request->file('image_9'))->save($image_path, 80, 'jpg');

                    $Component::updateFunction($post->id, $post->post_type, $number, $image_name, $mime, $image_path);

                    $IMAGE_EXIST = true;
                    break;
                }
            }

            if ($IMAGE_EXIST == false) {
                Image::make($request->file('image_9'))->save($image_path, 80, 'jpg');

                $Component::createFunction($post->id, $post->post_type, $image_name, $number, $mime, $image_path);
            }
        }
    }
}
