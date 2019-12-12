<?php namespace App\Controllers;

class Blocks extends BaseController
{

	public function index($page = 'blocks')
	{

      if ( ! is_file(APPPATH.'/Views/blocks/'.$page.'.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }


      $model = new \App\Models\BlocksModel();
      $blocks = $model->findAll();
      $data['blocks'] = $blocks;
      $data['title'] = ucfirst($page); // Capitalize the first letter
      $data['controller'] = 'pages';
      $data['page'] = $page;


      echo view('templates/header', $data);
      echo view('blocks/'.$page, $data);
      echo view('templates/footer', $data);
	}

  public function add_block() {
      helper('form');
      $model = new \App\Models\BlocksModel();
      $req_method = \Config\Services::request()->getMethod();

       if($req_method == 'post' && $this->validate([
       'block' => 'required',
       ])) {

        $model->save([
          'block' => $this->request->getVar('block'),
        ]);

       }


      $data['success_message'] = "Block " . $this->request->getVar('block')." is successfully added";     
      
      echo view('templates/header', $data);
      echo view('blocks/add_block', $data);
      echo view('templates/footer', $data);
  }

  public function remove_block($block_id) {
   $blockModel = new \App\Models\BlocksModel();
   $block = $blockModel->find($block_id);

   $success_message = 'Block ' . $block['block'] . " is removed!";
   $blockModel->delete($block_id);

  return redirect()->to('/attendance/public/blocks')->with('success_message', $success_message);

  }

	//--------------------------------------------------------------------

}

    // $cartModel = new \App\Models\CartsModel();
    // $bookModel = new \App\Models\BooksModel();

    // $cart = $cartModel->find($cart_id);
    // $book = $bookModel->find($cart['book_id']);
    // $success_message = $book['title']." has successfully remove from cart.";
    // $cartModel->delete($cart_id);
    // return redirect()->to('/jezelbookshop/public/carts')->with('success_message', $success_message);



  
  