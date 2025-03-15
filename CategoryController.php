<?php
include_once("Crud.php");

class CategoryController
{
  private $crud;

  public function __construct()
  {
    $this->crud = new Crud();
  }

  public function addPost()
  {
    $post = [
      'cat_name' => $_POST['cat_name'],
    ];

    $id = $this->crud->create($post, 'categories');
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

  public function getCategory($cat_id)
  {
    $query = "
      SELECT 
        categories.cat_id,
        categories.cat_name
      FROM 
        categories 
      WHERE
        categories.cat_id = $cat_id
    ";

    return $this->crud->read($query);
  }

  public function editCategory($cat_id)
  {
    $cat_name = $_POST['cat_name'];

    $query = "
      UPDATE
        categories
      SET
        categories.cat_name = '$cat_name'
      WHERE
        categories.cat_id = $cat_id
    ";

    $this->crud->update($query);
  }
}