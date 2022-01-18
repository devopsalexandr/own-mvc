<?php

class CommentsController extends Controller
{
    protected $commentModel;

    public function __construct(Comment $commentModel)
    {
        $this->commentModel = $commentModel;
    }

    public function index()
    {
        $comments = $this->commentModel->findAll();

        echo json_encode($comments);
    }

    public function create(CreateCommentRequest $request)
    {
        $comment = $this->commentModel;

        $comment->title = $request->title;
        $comment->body = $request->body;
        $comment->email = $request->email;
        $comment->username = $request->username;
        $comment->date = $request->date;

        $success = $comment->create();

        if($success){
            echo json_encode($request);
            return;
        }

        echo json_encode(["error" => "cant create entity"]);
    }
}