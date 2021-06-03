<?php 

interface EntityCRUD {
    public function all();
    public function getById($id);
    public function store($request);
    public function update($request);
    public function delete($id);
    public function storeImage($imageName,$imageId);
}