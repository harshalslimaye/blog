<?php
include_once("Crud.php");

class CommentsController
{
  private $crud;

  public function __construct()
  {
    $this->crud = new Crud();
  }

  public function getComments($post_id)
  {
    $query = "SELECT * FROM comments WHERE post_id = $post_id";

    return $this->crud->read($query);
  }

  public function addComment()
  {
    $comment = [
      'visitor_name' => $_POST['visitor_name'],
      'comment_body' => $_POST['comment_body'],
      'visitor_email' => $_POST['visitor_email'],
      'post_id' => $_POST['post_id']
    ];

    $this->crud->create($comment, 'comments');
  }

}