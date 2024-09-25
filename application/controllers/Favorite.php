<?php
class Favorite extends CI_Controller {

    public function index() {
        // Check if there are any favorites in the session
        $favorites = $this->session->userdata('favorites');

        // If there are no favorites, initialize it as an empty array
        if (empty($favorites)) {
            $favorites = [];
        }

        // Pass the favorites data to the view
        $data['favorites'] = $favorites;

        // Load the favorit view
        $this->load->view('favorit', $data);
    }

    public function add() {
        // Retrieve the current favorites from the session
        $favorites = $this->session->userdata('favorites');

        // If no favorites are set, initialize as an empty array
        if (!$favorites) {
            $favorites = [];
        }

        // Add the new favorite item to the array
        $new_favorite = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'gambar_satu' => $this->input->post('gambar_satu') // Add this in your form
        );

        $favorites[] = $new_favorite;

        // Save the updated favorites array back to the session
        $this->session->set_userdata('favorites', $favorites);

        // Redirect to the same page or favorites page
        redirect($this->input->post('redirect_page'));
    }
}

?>