<?php

function set_pesan($pesan, $tipe = true)
{
	$ci = get_instance();
	if ($tipe) {
		$ci->session->set_flashdata('pesan', "<div class='alert alert-success'><strong>SUCCESS!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
	} else {
		$ci->session->set_flashdata('pesan', "<div class='alert alert-danger'><strong>ERROR!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
	}
}
function set_pesan_danger($pesan, $tipe = true)
{
	$ci = get_instance();
	if ($tipe) {
		$ci->session->set_flashdata('pesan', "<div class='alert alert-danger'><strong>ERROR!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
	}
}


function output_json($data)
{
	$ci = get_instance();
	$data = json_encode($data);
	$ci->output->set_content_type('application/json')->set_output($data);
}
