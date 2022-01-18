<?php

class CommentsController extends Controller
{
    public function create(CreateCommentRequest $request)
    {
        echo json_encode('comments');
    }
}