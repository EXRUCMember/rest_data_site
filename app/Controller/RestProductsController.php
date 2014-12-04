<?php
class RestProductsController extends AppController {
    public $uses = array('Product');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
        $product = $this->Product->find('all');
        $this->set(array(
            'products' => $product,
            '_serialize' => array('products')
        ));

    }

    public function add() {
        $this->Product->create();
        if ($this->Product->save($this->request->data)) {
            $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function view($c_id) {
       $product =  $this->Product->getProduct($c_id);
        $this->set(array(
            'products' => $product,
            '_serialize' => array('products')
        ));
    }



    public function edit($id) {
        $this->Product->id = $id;
        if ($this->Product->save($this->request->data)) {
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
        if ($this->Product->delete($id)) {
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