<?php


function getRandomImage(array $images) {
    foreach ($images as $key => $image) {
        $image = explode("/", $image);
        $image = array_pop($image);
        $images[$key] = $image;
    }

    return $images[mt_rand(0, count($images)-1)];
}