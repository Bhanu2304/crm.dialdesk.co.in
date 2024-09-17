<?php
namespace Controller;

class ApiController
{
    public function resource()
    {
        echo json_encode(['message' => 'Success']);
    }
}