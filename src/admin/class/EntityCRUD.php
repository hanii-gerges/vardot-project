<?php 

interface EntityCRUD {
    public function all();
    public function getById($id);
    public function store($request);
    public function update($request);
    public function delete($id);
    public function uploadImage($imageName,$imageId);
    public function validateImage($imageName);
    public function storeImage($imageName, $id);
    public function getMedia($id);

}