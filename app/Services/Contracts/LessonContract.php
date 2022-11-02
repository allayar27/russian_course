<?php

namespace App\Services\Contracts;

interface LessonContract {

    public function get();
    public function show($id);
    public function search($title);
    public function create();
    public function update($id);
    public function delete($id);
}
