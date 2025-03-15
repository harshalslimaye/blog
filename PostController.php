<?php

include "Crud.php";

class PostController
{
  private $crud;

  public function __construct()
  {
    $this->crud = new Crud();
  }

  public function getPosts()
  {
    $query = "
      SELECT 
        posts.post_id, 
        posts.is_featured, 
        posts.post_title,
        posts.post_content, 
        posts.post_image,
        categories.cat_name,
        count(comments.post_id) as nu_comments
      FROM 
        posts
      LEFT JOIN
        comments
      ON 
        comments.post_id = posts.post_id
      LEFT JOIN 
        categories
      ON
        categories.cat_id = posts.cat_id
      GROUP BY
        posts.post_id
    ";

    return $this->crud->read($query);
  }

  public function getPost($post_id)
  {
    $query = "
      SELECT 
        posts.post_id, 
        posts.is_featured, 
        posts.post_title,
        posts.post_content, 
        posts.post_image,
        posts.created_at,
        categories.cat_id,
        categories.cat_name
      FROM 
        posts
      LEFT JOIN 
        categories
      ON
        categories.cat_id = posts.cat_id
      WHERE posts.post_id = $post_id
    ";

    return $this->crud->read($query);
  }

  public function addPost()
  {
    $post = [
      "post_content" => htmlspecialchars($_POST['post_content']),
      'post_title' => $_POST['post_title'],
      "post_image" => $_FILES['post_image']['name'],
      "cat_id" => $_POST['cat_id'],
    ];

    $id = $this->crud->create($post, 'posts');
    $this->moveUploadedImage($id);
  }

  public function moveUploadedImage($post_id)
  {
    $dir = "../../post_images/post_$post_id";
    $image_name = basename($_FILES['post_image']['name']);

    if (!file_exists($dir)) {
      mkdir($dir, 0777, true);
    }

    $dir = $dir . "/" . $image_name;

    move_uploaded_file($_FILES['post_image']['tmp_name'], $dir);
  }

  public function editPost($post_id)
  {

    $post_content = addslashes($_POST['post_content']);
    $post_title = $_POST['post_title'];
    $post_image = basename($_FILES['post_image']['name']);
    $cat_id = $_POST['cat_id'];

    $query = "
      UPDATE
        posts
      SET
        post_title = '$post_title',
        post_content = '$post_content',
        cat_id = '$cat_id'
    ";

    if (!empty($post_image)) {
      $query = $query . ", post_image = '$post_image'";
      $this->deleteOldImage($post_id);
      $this->moveUploadedImage($post_id);
    }

    $query = $query . "
      WHERE
        posts.post_id = $post_id
    ";

    $this->crud->update($query);
  }

  public function deleteOldImage($post_id)
  {

    $old_image = $this->crud->read("SELECT post_image from posts where post_id = $post_id")[0]['post_image'];
    $old_image_path = "../../post_images/post_$post_id/$old_image";

    if (file_exists($old_image_path)) {
      unlink($old_image_path);
    }
  }

  public function deletePost($post_id)
  {
    $query = "
      DELETE FROM
        posts
      WHERE
        posts.post_id = '$post_id'
    ";

    $this->crud->delete($query);
  }

  public function markAsFeatured($post_id)
  {
    $query = "
      UPDATE
        posts
      SET
        is_featured = 1
      WHERE
        posts.post_id = $post_id
    ";

    $this->crud->update($query);
  }

  public function markAsUnFeatured($post_id)
  {
    $query = "
      UPDATE
        posts
      SET
        is_featured = 0
      WHERE
        posts.post_id = $post_id
    ";

    $this->crud->update($query);
  }

  public function getFeaturedposts()
  {
    $query = "
      SELECT 
        posts.post_id, 
        posts.is_featured, 
        posts.post_title,
        posts.post_content, 
        posts.post_image,
        posts.created_at,
        categories.cat_id,
        categories.cat_name,
        count(comments.post_id) as nu_comments
      FROM 
        posts
      LEFT JOIN
        comments
      ON 
        comments.post_id = posts.post_id
      LEFT JOIN 
        categories
      ON
        categories.cat_id = posts.cat_id
      WHERE
        posts.is_featured = 1
      GROUP BY
        posts.post_id
    ";

    return $this->crud->read($query);
  }

  public function getCategories()
  {
    $query = "
      SELECT 
        categories.cat_id,
        categories.cat_name,
        count(posts.cat_id) as num_of_posts
      FROM 
        categories 
      LEFT JOIN 
        posts 
      ON 
        posts.cat_id = categories.cat_id
      GROUP BY 
        categories.cat_id
    ";

    return $this->crud->read($query);
  }

  public function getPostsByCategory($cat_id)
  {
    $query = "
      SELECT 
        posts.post_id, 
        posts.is_featured, 
        posts.post_title,
        posts.post_content, 
        posts.post_image,
        posts.created_at,
        categories.cat_name,
        count(comments.post_id) as nu_comments
      FROM 
        posts
      LEFT JOIN
        comments
      ON 
        comments.post_id = posts.post_id
      LEFT JOIN 
        categories
      ON
        categories.cat_id = posts.cat_id
      WHERE
        categories.cat_id = $cat_id
      GROUP BY
        posts.post_id
    ";

    return $this->crud->read($query);
  }
}