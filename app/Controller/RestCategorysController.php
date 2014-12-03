<?php
class RestCategorysController extends AppController {
    public $uses = array('Category');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
    public function index() {
        $category = $this->Category->find('all');
        $this->set(array(
            'categories' => $category,
            '_serialize' => array('categories')
        ));

    }
    public function add() {
        $this->Category->create();
        if ($this->Category->save($this->request->data)) {
            $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function view($id) {
        $category = $this->Category->findById($id);
        $this->set(array(
            'category' => $category,
            '_serialize' => array('category')
        ));
    }


    public function edit($id) {
        $this->Category->id = $id;
        if ($this->Category->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Category->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }



}