<?php

class CommentsController extends Controller
{
    public function index()
    {
        echo json_encode("show all comments");
    }

    public function create(CreateCommentRequest $request)
    {
        echo json_encode($request);
    }
}