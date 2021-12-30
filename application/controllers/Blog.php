<?php
class Blog extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Blog_model');
    }

    public function index()
    {   
     
        $data['blog']=$this->Blog_model->getBlogs();
        $this->load->view('blog',$data);

    }
    public function listdata()
    {
        $this->load->view('list_data');
    }
    public function detail($url)
    {

        $data['blog']=$this->Blog_model->getSingleBlog('url',$url);
        $this->load->view('detail',$data);

    }

    public function add()
    {
        if($this->input->post())
        {
            $data['title']=$this->input->post('title');
            $data['content']=$this->input->post('content');
            $data['url']=$this->input->post('url');
        $id=$this->Blog_model->insertBlog($data);
        if($id)
            echo "Data berhasil disimpan";
        else
            echo "Data gagal disimpan";
        }
        $this->load->view('form_add');
    }

    public function edit($id)
	{
		$data['blog'] = $this->Blog_model->getSingleBlog('id',$id);
		if ($this->input->post()) {
			$post['title'] = $this->input->post('title');
			$post['content'] = $this->input->post('content');
			$post['url'] = $this->input->post('url');

			$id = $this->Blog_model->updateBlog($id,$post);

			if ($id)
				echo "Data berhasil disimpan";
			else
				echo "Data gagal disimpan";
		}
		$this->load->view('form_edit',$data);
	}

    public function delete($id)
    {
        $this->Blog_model->deleteBlog($id);
        redirect('Blog/index');
    }
}
?>