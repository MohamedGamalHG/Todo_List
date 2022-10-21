<?php

namespace App\Repository;

interface TodoListRepositoryInterface
{
        public function index();
        public function store($request);
        public function update($request);
        public function delete($request);
        public function Check_Status($request);
}
