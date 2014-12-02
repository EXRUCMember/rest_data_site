<?php
class RestProductsController extends AppController {
    public function index() {
        $product = $this->Product->find('all');
        $this->set(array(
            'phones' => $product,
            '_serialize' => array('phones')
        ));
    }
}