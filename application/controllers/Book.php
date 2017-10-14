<?php

require APPPATH . '/libraries/REST_Controller.php';
Class Book Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // untuk menampilkan data
    function index_get(){
        $data = $this->db->get('books')->result();
        return $this->response($data,200);
    }
    
    function index_post(){
     $isbn          = $this->post('isbn');
     $title         = $this->post('title');
     $writer        = $this->post('writer');
     $description   = $this->post('description');
     
     $book = array (
         
         'title' => $title,
         'isbn'  => $isbn,
         'writer' => $writer,
         'description' => $description);
         
    $insert = $this->db->insert('books',$book);
    
    if ($insert){
        $this->response($book,200);
    }else{
        $data = array ('status'=>'gagal_insert');
        $this->response($data,502);
    }
        
    }
}

?>