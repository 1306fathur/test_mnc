<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('list');
	}

	public function nomor_1()
	{
		$genap = [];
		$ganjil = [];
		$prima = [];
		$kelipatan_lima = [];
		for ($x = 1; $x <= 100; $x++) {
			if ($x % 5 == 0) {
				array_push($kelipatan_lima, $x);
			} else if ($x % 2 == 1) {
				array_push($ganjil, $x);
			} else if ($x % 2 == 0) {
				array_push($genap, $x);
			}
		}

		for ($i = 1; $i <= 100; $i++) {
			$a = 0;
			for ($j = 1; $j <= $i; $j++) {
				if ($i % $j == 0) {
					$a++;
				}
			}
			if ($a == 2) {
				array_push($prima, $i);
			}
		}
		$data = [
			'bilangan prima' => $prima,
			'bilangan ganjil' => $ganjil,
			'bilangan genap' => $genap,
			'bilangan kelipatan lima' => $kelipatan_lima
		];
		print_r($data);
		die;
	}

	public function nomor_2()
	{
		$x = 5;
		for ($a = $x; $a > 0; $a--) {
			for ($b = $x; $b >= $a; $b--) {
				echo "X";
			}
			echo "<br>";
		}
	}

	public function nomor_3()
	{
		$client = new Client([
			'base_uri' => 'https://reqres.in/api/users?page=2',
		]);

		$response = $client->request('GET');
		$data['users'] = json_decode($response->getBody()->getContents(), true);

		$users['users'] = $data['users']['data'];
		// print_r($users['users']);
		// die;
		$this->load->view('nomor_3', $users);
	}

	public function nomor_3_detail($user_id)
	{
		$client = new Client([
			'base_uri' => 'https://reqres.in/api/users/' . $user_id,
		]);

		$response = $client->request('GET');
		$data['user'] = json_decode($response->getBody()->getContents(), true)['data'];

		// print_r($data['user']);
		// die;
		// print_r($users['users']);
		// die;
		$this->load->view('nomor_3_detail', $data);
	}

	public function nomor_4()
	{
		if ($this->session->user) {
			redirect('welcome/nomor_4_logged_in');
		}
		// var_dump($_SESSION);
		// die;
		$this->load->view('login');
	}

	public function nomor_4_post()
	{
		// var_dump($_SESSION);
		// die;
		$data = array(
			'email'     => $this->input->post('email'),
			'login_status' => 'Logged in'
		);
		$this->session->set_userdata('user', $data);
		redirect('welcome/nomor_4_logged_in');
	}

	public function nomor_4_logged_in()
	{
		// print_r($_SESSION['user']);
		// die;
		if (!$_SESSION['user']) {
			redirect('welcome/nomor_4');
		}

		// var_dump($_SESSION);
		// die;
		// if (!$this->session->user) {
		// 	redirect('welcome/nomor_4');
		// }
		// $data = array(
		// 	'email'     => $this->input->post('email'),
		// 	'login_status' => 'Logged in'
		// );
		// $this->session->set_userdata('user', $data);
		$this->load->view('sudah_login');
	}

	public function logout()
	{
		session_destroy();
		redirect('welcome/nomor_4');
	}

	public function nomor_5()
	{
		echo 'Jawaban nya adalah: 8 dan 9<br>
		karena variable x di dalam dan diluar function adalah berbeda, <br>
		jadi saat x di set menjadi 2, variable x diluar function tetap 8, <br>
		sehingga saat di cetak variable x diluar function tetap 8 dan return dari function <br>
		adalah x + y + z alias 2 + 3 + 4 hasilnya 9';
	}

	public function berita()
	{
		// var_dump($_SERVER['REQUEST_URI']);
		// die;
		$keyword = $this->input->get('search');
		if ($keyword === null) {

			$data['beritas'] = $this->db->order_by('publish_date', 'DESC')->get('beritas')->result();
		} else {
			$data['beritas'] = $this->db->like('title', $keyword, 'both')
				->or_like('description', $keyword, 'both')
				->or_like('content', $keyword, 'both')
				->or_like('publish_date', $keyword, 'both')
				->order_by('publish_date', 'DESC')->get('beritas')->result();
		}

		$this->load->view('berita', $data);
	}

	public function berita_post()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'content' => $this->input->post('content')
		);

		$this->db->insert('beritas', $data);
		redirect('welcome/berita');
	}

	public function berita_edit($berita_id)
	{
		$data['berita'] = $this->db->order_by('publish_date', 'DESC')
			->get_where('beritas', ['id' => $berita_id])->row();

		$this->load->view('berita_edit', $data);
	}

	public function berita_update($berita_id)
	{
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'content' => $this->input->post('content'),
		);

		$this->db->where('id', $berita_id);
		$this->db->update('beritas', $data);
		redirect('welcome/berita');
	}

	public function berita_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('beritas');
		redirect('welcome/berita');
	}
}
