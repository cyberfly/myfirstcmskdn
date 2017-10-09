<?php 

class Article_model extends MY_Model{

	public $table = 'articles';
	public $primary_key = 'id';

	public function article_info()
	{
		//select column

		$this->fields('articles.*, categories.category_name');

		//join table

		$this->db->join('categories', 'categories.id = articles.category_id', 'left');

		return $this;
	}
}
